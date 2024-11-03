<?php

namespace App\Http\Controllers\Dashboard\Partners;

use App\Http\Controllers\Controller;
use App\Models\Partners;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.partners.app');
    }



    public function edit($id)
    {
        $partner = Partners::firstWhere(['id' => $id]);
        if (!$partner) {
            abort(404);
        }
        return view('dashboard.partners.edit', compact(['partner']));
    }
}
