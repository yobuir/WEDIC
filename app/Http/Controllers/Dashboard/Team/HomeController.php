<?php

namespace App\Http\Controllers\Dashboard\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.team.app');
    }

    public function edit($id)
    {
        $team = Team::firstWhere(['id' => $id]);
        if (!$team) {
            abort(404);
        }
        return view('dashboard.team.edit', compact(['team']));
    }


}
