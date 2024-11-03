<?php

namespace App\Livewire\Pages\Dashboard\Trainings\Fees;

use App\Models\TrainingFee;
use Livewire\Component;

class NewLivewire extends Component
{
    public $openModel;
    public $trainingFee_id;

    public $type, $method, $amount, $frequency, $currency, $installmentAmount, $duration;
    public function toggleModel()
    {
        $this->openModel = true;
    }

    public function store()
    {
        try {
            $TrainingFee = TrainingFee::where('training_id', $this->trainingFee_id)->where('status','=','published')->first();
            if ($TrainingFee) {
                $TrainingFee->update(['status' => 'archived']);
            }
            TrainingFee::create([
                'frequency' => $this->frequency,
                'installmentAmount' => $this->installmentAmount ?? 0,
                'amount' => $this->amount??0,
                'training_id' => $this->trainingFee_id,
                'currency' => $this->currency ?? 'RWF',
                'type' => $this->type,
                'method' => $this->method,
                'duration' => $this->duration,
                'status' => 'published'
            ]);
            $this->openModel = false;
            session()->flash('success', 'successful added ');
        } catch (\Throwable $th) {

            session()->flash('error', $th->getMessage());
        }
        return $this->redirect(url()->previous());
    }

    public function closeModal()
    {
        $this->openModel = false;
    }

    public function mount($id)
    {
        $this->trainingFee_id = $id;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.trainings.fees.new-livewire');
    }
}
