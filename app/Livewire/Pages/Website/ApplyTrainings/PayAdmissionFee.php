<?php

namespace App\Livewire\Pages\Website\ApplyTrainings;

use App\Models\Applicant;
use App\Models\Payment;
use App\Models\PInstallMentTracter;
use App\Services\FlutterwaveService;
use Livewire\Component;

class PayAdmissionFee extends Component
{
    public $training;
    public $pricing;
    public $installmentTracker;
    public $payment;
    public $applicant;
    public function mount($training)
    {
        $this->training = $training;
        $this->pricing = $this->training?->pricing?->where('status', 'published')->first();
        $this->installmentTracker = PInstallMentTracter::where('service_id', $this->training?->id)->where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        $this->payment = Payment::where('service_id', $this->training?->id)->where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        $this->applicant = Applicant::where('user_id', auth()->user()->id)->where(
            'training_id',
            $this->training?->id
        )->first();
    }

    public function initializePaymentRequest()
    {
        try {
            $reference_id = uniqid('trx_');


            if (
                !$this->payment
            ) {
                Payment::create([
                    'service_id' => $this->training?->id,
                    'service_type' => 'training',
                    'status' => 'pending', 'payment_method' => 'flutterwave', 'currency' => $this->pricing?->currency,
                    'amount' => $this->pricing?->installmentAmount ??  $this->pricing?->amount,
                    'reference_id' => $reference_id, 'user_id' => auth()->user()->id
                ]);
            } else {
                $this->payment?->update(['reference_id' => $reference_id]);
            }

            if (!$this->installmentTracker) {
                PInstallMentTracter::create([
                    'service_id' => $this->training?->id,
                    'service_type' => 'training',
                    'user_id' => auth()->user()->id,
                    'frequency' => $this->pricing?->frequency, 'r_amount' => $this->pricing?->amount, 'p_amount' =>  0,
                ]);
            }

            $flutterwave = new FlutterwaveService();

            $paymentData = [
                'tx_ref' => $reference_id,
                'amount' =>
                $this->pricing?->installmentAmount ??  $this->pricing?->amount,
                'currency'
                => $this->pricing?->currency,
                'redirect_url' => route('dashboard.payment.callback'),
                'customer' => [
                    'email' => auth()->user()->email,
                    'name' => auth()->user()->last_name . ' ' . auth()->user()->first_name,
                    'phonenumber' => auth()->user()->phone,
                ],
                'payment_options' => 'card, ussd, mobilemoneyrwanda,account,credit,nqr',
                'customizations' => [
                    'title' => config('app.name'),
                ],
            ];

            $response = $flutterwave->createPayment($paymentData);

            if ($response['status'] === 'success') {
                return redirect()->away($response['data']['link']);
            } else {
                session()->flash('error', 'Payment initiation failed!');
            }
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
        }
        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.pages.website.apply-trainings.pay-admission-fee');
    }
}
