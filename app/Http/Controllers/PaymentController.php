<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Payment;
use App\Models\PInstallMentTracter;
use App\Models\Training;
use App\Services\FlutterwaveService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public $installmentTracker, $applicant;
    public function verifyInstallment($trainingId, $amount)
    {
        $this->installmentTracker = PInstallMentTracter::where('service_id', $trainingId)->where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($this->installmentTracker) {
            $r_amount = ($this->installmentTracker?->r_amount - $amount);

            if ($r_amount <= 0) {
                $this->verifyApplicant($trainingId);
            }
            $this->installmentTracker?->update(['r_amount' => $r_amount, 'p_amount' => $amount]);
        }
    }


    public function verifyApplicant($trainingId)
    {
        $this->applicant = Applicant::where('id', $trainingId)->where('user_id', auth()->user()->id)->first();
        if ($this->applicant) {
            $this->applicant->update(['application_status' => 'paid']);
        }
    }


    public function handlePaymentCallback(Request $request)
    {
        try {
            $transactionId = $request->query('transaction_id');

            $flutterwave = new FlutterwaveService();
            $response = $flutterwave->verifyPayment($transactionId);

            $payment = Payment::firstWhere('reference_id', $request->get('tx_ref'));

            if (!$payment) {
                dd('Payment not found');
            }

            if (!$response) {
                $payment?->update(['status' => 'cancelled']);
            }
            if (!$transactionId) {
                abort(404);
            }

            if ($response['status'] === 'success' && $response['data']['status'] === 'successful') {

                if ($payment->service_type == 'training') {
                    $servicePaid = Training::firstWhere('id', $payment->service_id)?->pricing?->where('status', 'published')->first();
                    if ($servicePaid?->method == 'installments') {
                        $this->verifyInstallment($payment->service_id, $payment->amount);
                    } else {
                        $this->verifyApplicant($payment->service_id);
                    }
                } else {
                    dd('payment reason not found');
                }
                $payment?->update([
                    'app_fee' => $response['data']['app_fee'], 'payment_method' => $response['data']['payment_type'], 'merchant_fee' => $response['data']['merchant_fee'], 'status' => 'completed'
                ]);
            } else {
                if ($response['status'] === 'cancelled') {
                    $payment?->update(['status' => 'cancelled']);
                } else {
                    $payment?->update(['status' => 'failed']);
                }
            }
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('dashboard.');
    }
}
