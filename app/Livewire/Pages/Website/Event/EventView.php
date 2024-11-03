<?php

namespace App\Livewire\Pages\Website\Event;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Collection;

class EventView extends Component
{
    public $selectedStartDate;
    public $selectedEndDate;
    public $currentSlide = 0;
    public $direction = 'right';
    public $transitioning = false;
    public $featuredEvents;
    public $showDatePicker = false;

    protected $listeners = ['dateSelected' => 'updateEvents'];

    public function mount()
    {
        $this->resetFilters();
    }

    public function updateEvents()
    {
        $this->emit('refreshEvents');
    }

    public function resetFilters()
    {
        $this->selectedStartDate = null;
        $this->selectedEndDate = null;
        $this->dispatch('filtersReset');
        session()->flash('message', 'Filters have been reset.');
    }

    public function nextSlide()
    {
        $this->direction = 'right';
        $this->transitioning = true;
        $totalSlides = count($this->featuredEvents);
        $this->currentSlide = ($this->currentSlide + 1) % $totalSlides;
        $this->dispatch('slideChanged');
    }

    public function previousSlide()
    {
        $this->direction = 'left';
        $this->transitioning = true;
        $totalSlides = count($this->featuredEvents);
        $this->currentSlide = ($this->currentSlide - 1 + $totalSlides) % $totalSlides;
        $this->dispatch('slideChanged');
    }

    public function setSlide($index)
    {
        $this->direction = $index > $this->currentSlide ? 'right' : 'left';
        $this->transitioning = true;
        $this->currentSlide = $index;
        $this->dispatch('slideChanged');
    }

    public function nextDates()
    {
        if (!$this->selectedStartDate || !$this->selectedEndDate) {
            $this->selectedStartDate = Carbon::now()->startOfMonth()->format('Y-m-d');
            $this->selectedEndDate = Carbon::now()->endOfMonth()->format('Y-m-d');
            return;
        }

        $start = Carbon::parse($this->selectedStartDate);
        $end = Carbon::parse($this->selectedEndDate);
        $diff = $start->diffInDays($end);

        $this->selectedStartDate = $start->addDays($diff + 1)->format('Y-m-d');
        $this->selectedEndDate = Carbon::parse($this->selectedStartDate)->addDays($diff)->format('Y-m-d');
    }

    public function previousDates()
    {
        if (!$this->selectedStartDate || !$this->selectedEndDate) {
            $this->selectedStartDate = Carbon::now()->startOfMonth()->format('Y-m-d');
            $this->selectedEndDate = Carbon::now()->endOfMonth()->format('Y-m-d');
            return;
        }

        $start = Carbon::parse($this->selectedStartDate);
        $end = Carbon::parse($this->selectedEndDate);
        $diff = $start->diffInDays($end);

        $this->selectedStartDate = $start->subDays($diff + 1)->format('Y-m-d');
        $this->selectedEndDate = Carbon::parse($this->selectedStartDate)->addDays($diff)->format('Y-m-d');
    }

    public function setToday()
    {
        $this->selectedStartDate = Carbon::now()->format('Y-m-d');
        $this->selectedEndDate = Carbon::now()->format('Y-m-d');
    }

    public function updateDateRange($startDate, $endDate)
    {
        $this->selectedStartDate = $startDate;
        $this->selectedEndDate = $endDate;
    }

    protected function getFilteredEvents(): Collection
    {
        $query = Event::where('status', 'published')
            ->with(['category']) // Eager load category relationship
            ->orderBy('date')
            ->orderBy('start_time');

        // Apply date filters if they exist
        if ($this->selectedStartDate && $this->selectedEndDate) {
            $query->where('date', '>=', $this->selectedStartDate)
                ->where('date', '<=', $this->selectedEndDate);
        }

        return $query->get();
    }

    protected function groupEventsByDate(Collection $events): array
    {
        $grouped = [];

        foreach ($events as $event) {
            $date = Carbon::parse($event->date)->format('Y-m-d');
            if (!isset($grouped[$date])) {
                $grouped[$date] = collect();
            }
            $grouped[$date]->push($event);
        }

        // Sort by date
        ksort($grouped);

        return $grouped;
    }

    public function render()
    {
        // Get featured events for slider
        $this->featuredEvents = Event::where('status', 'published')
            ->where('featured', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get filtered events
        $events = $this->getFilteredEvents();

        // Determine if we should show grouped or filtered view
        $hasFilters = $this->selectedStartDate && $this->selectedEndDate;

        // Group events if no filters are applied
        $groupedEvents = $hasFilters ? ['filtered' => $events] : $this->groupEventsByDate($events);

        return view('livewire.pages.website.event.event-view', [
            'featuredEvents' => $this->featuredEvents,
            'filteredEvents' => $events,
            'groupedEvents' => $groupedEvents,
            'hasFilters' => $hasFilters
        ]);
    }
}
