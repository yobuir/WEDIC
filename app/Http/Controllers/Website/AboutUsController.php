<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Partners;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {

        return view('website.about.app', [
            'partners' => Partners::all(),
        ]);
    }
}
