<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function localize($locale)
    {

        if (!in_array($locale, ['en', 'rw', 'fr'])) {
            return redirect()->back()->with('error', 'Invalid locale');
        }
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
