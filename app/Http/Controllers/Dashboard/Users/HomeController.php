<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.users.app');
    }


    public function edit($id)
    {
        $user = User::firstWhere(['id' => $id]);
        if (!$user) {
            abort(404);
        }
        return view('dashboard.users.edit', compact(['user']));
    }
}
