<?php

namespace App\Http\Controllers\Dashboard\Applicants;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.applicants.app');
    }

    public function view($id)
    {
        $training = Training::findOrFail($id);

        return view('dashboard.applicants.view', compact(['training']));
    }



    public function admissionFee($id)
    {
        $training = Training::findOrFail($id);

        return view('dashboard.applicants.feePayment', compact(['training']));
    }

    public function settings($id)
    {
        $user = Applicant::firstWhere('user_id',$id);
        if (!$user) {
            abort(404);
        }
        if (auth()->user()->id == $id or auth()->user()->isAdmin()) {
        } else {
            abort(403);
        }
        return view('dashboard.applicants.settings.app', compact(['user']));
    }
}
