<?php

namespace App\Livewire\Pages\Dashboard\Mailings;

use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;
use League\Csv\Reader;
use Livewire\WithFileUploads;

class AppLivewire extends Component
{
    use WithPagination,WithFileUploads;

    public $title;
    public $content;
    public $scheduled_at;
    public $selectedSubscribers = [];
    public $search = '';
    public $showForm = false;
    public $editingNewsletterId;

    // New properties for subscriber management
    public $showSubscriberForm = false;
    public $subscriberName;
    public $subscriberEmail;
    public $subscriberPhone;
    public $csvFile;
    public $importProgress = 0;
    public $totalRows = 0;
    public $processedRows = 0;

    // Filters
    public $filterSubscribed = true;
    public $dateRange = '';
    public $selectAll = false;

    public $openModel = false;


    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:10',
        'scheduled_at' => 'nullable|date|after:now',
        'selectedSubscribers' => 'required|array|min:1',
    ];

    public function mount()
    {
        $this->resetForm();
    }


    public function toggleModel()
    {
        $this->openModel = true;
    }

    public function closeModal()
    {
        $this->openModel = false;
    }

    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->scheduled_at = '';
        $this->selectedSubscribers = [];
        $this->editingNewsletterId = null;
        $this->showForm = false;
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $this->editingNewsletterId = $id;
        $this->title = $newsletter->title;
        $this->content = $newsletter->content;
        $this->scheduled_at = $newsletter->scheduled_at?->format('Y-m-d H:i');
        $this->selectedSubscribers = $newsletter->subscribers->pluck('id')->toArray();
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        try {
            $newsletter = $this->editingNewsletterId
                ? Newsletter::findOrFail($this->editingNewsletterId)
                : new Newsletter();

            $newsletter->fill([
                'title' => $this->title,
                'content' => $this->content,
                'scheduled_at' => $this->scheduled_at,
                'status' => $this->scheduled_at ? 'scheduled' : 'draft'
            ]);

            $newsletter->save();

            // Sync subscribers
            $newsletter->subscribers()->sync($this->selectedSubscribers);

            // If no scheduling, send immediately
            // if (!$this->scheduled_at) {
            $this->sendNewsletter($newsletter);
            // }

            session()->flash('message', 'Newsletter ' . ($this->editingNewsletterId ? 'updated' : 'created') . ' successfully.');
            $this->resetForm();
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }


    public function resetSubscriberForm()
    {
        $this->subscriberName = '';
        $this->subscriberEmail = '';
        $this->subscriberPhone = '';
        $this->showSubscriberForm = false;
    }


    public function saveSubscriber()
    {
        $this->validate([
            'subscriberName' => 'required|min:2',
            'subscriberEmail' => 'required|email|unique:newsletter_subscribers,email',
            'subscriberPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        try {
            NewsletterSubscriber::create([
                'name' => $this->subscriberName,
                'email' => $this->subscriberEmail,
                'phone' => $this->subscriberPhone,
                'is_subscribed' => true,
            ]);

            session()->flash('message', 'Subscriber added successfully.');
            $this->resetSubscriberForm();
            $this->openModel = false;
        } catch (\Exception $e) {
            session()->flash('error', 'Error adding subscriber: ' . $e->getMessage());
        }
    }

    public function importSubscribers()
    {
        $this->validate([
            'csvFile' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        try {
            $path = $this->csvFile->getRealPath();
            $csv = Reader::createFromPath($path, 'r');
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();
            $this->totalRows = iterator_count($csv);
            $this->processedRows = 0;

            DB::beginTransaction();

            foreach ($records as $record) {
                // Skip if email is missing or invalid
                if (empty($record['email']) || !filter_var($record['email'], FILTER_VALIDATE_EMAIL)) {
                    continue;
                }

                // Check if subscriber already exists
                $subscriber = NewsletterSubscriber::where('email', $record['email'])->first();

                if (!$subscriber) {
                    NewsletterSubscriber::create([
                        'name' => $record['name'] ?? '',
                        'email' => $record['email'],
                        'phone' => $record['phone'] ?? '',
                        'is_subscribed' => true,
                    ]);
                }

                $this->processedRows++;
                $this->importProgress = ($this->processedRows / $this->totalRows) * 100;
            }

            DB::commit();
            session()->flash('message', "Successfully imported {$this->processedRows} subscribers.");

            $this->csvFile = null;
            $this->importProgress = 0;
            $this->totalRows = 0;
            $this->processedRows = 0;
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            session()->flash('error', 'Error importing subscribers: ' . $e->getMessage());
        }
    }












    public function delete($id)
    {
        try {
            $newsletter = Newsletter::findOrFail($id);
            $newsletter->delete();
            session()->flash('message', 'Newsletter deleted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting newsletter.');
        }
    }

    public function sendNewsletter(Newsletter $newsletter)
    {
        try {
            DB::beginTransaction();

            foreach ($newsletter->subscribers as $subscriber) {
                if ($subscriber->is_subscribed) {
                    try {
                        // Send email directly without queuing
                        Mail::to($subscriber->email)->send(new NewsletterMail($newsletter, $subscriber));

                        // Update subscriber's last sent timestamp
                        $subscriber->update(['last_sent_at' => now()]);

                        // Update pivot table status
                        $newsletter->subscribers()->updateExistingPivot($subscriber->id, [
                            'status' => 'sent',
                            'sent_at' => now()
                        ]);
                    } catch (\Exception $e) {
                        // Log the error for this specific subscriber
                        Log::error('Failed to send newsletter to subscriber', [
                            'subscriber_id' => $subscriber->id,
                            'email' => $subscriber->email,
                            'error' => $e->getMessage()
                        ]);

                        // Update pivot with failed status
                        $newsletter->subscribers()->updateExistingPivot($subscriber->id, [
                            'status' => 'failed',
                            'sent_at' => now()
                        ]);
                    }
                }
            }

            // Update newsletter status
            $newsletter->update([
                'status' => 'sent',
                'sent_at' => now()
            ]);

            DB::commit();
            session()->flash('message', 'Newsletter sent successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error sending newsletter: ' . $e->getMessage());
        }
    }

    private function getFilteredSubscribers()
    {
        return NewsletterSubscriber::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterSubscribed, function ($query) {
                $query->where('is_subscribed', true);
            });
    }

    public function updatedSearch()
    {
        // Reset selected subscribers when search changes
        $this->selectedSubscribers = array_intersect(
            $this->selectedSubscribers,
            $this->getFilteredSubscribers()->pluck('id')->map(fn($id) => (string) $id)->toArray()
        );
    }
    public function toggleAllSubscribers()
    {
        if (count($this->selectedSubscribers) === $this->getFilteredSubscribers()->count()) {
            $this->selectedSubscribers = [];
        } else {
            $this->selectedSubscribers = $this->getFilteredSubscribers()
                ->pluck('id')
                ->map(fn($id) => (string) $id)
                ->toArray();
        }
    }

    public function toggleSubscriberSelection($subscriberId)
    {
        if (in_array($subscriberId, $this->selectedSubscribers)) {
            $this->selectedSubscribers = array_diff($this->selectedSubscribers, [$subscriberId]);
        } else {
            $this->selectedSubscribers[] = $subscriberId;
        }
    }

    public function render()
    {
        $query = NewsletterSubscriber::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterSubscribed, function ($query) {
                $query->where('is_subscribed', true);
            });

        $newsletters = Newsletter::latest()->paginate(10);

        $subscribers = $this->getFilteredSubscribers()->get();

        return view('livewire.pages.dashboard.mailings.app-livewire',
            [
                'newsletters' => $newsletters,
                'subscribers' => $subscribers
            ]
        );
    }
}
