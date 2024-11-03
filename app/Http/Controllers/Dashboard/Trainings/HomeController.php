<?php

namespace App\Http\Controllers\Dashboard\Trainings;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.trainings.app');
    }

    public function edit($id)
    {
        $training = Training::firstWhere(['id' => $id]);
        if (!$training) {
            abort(404);
        }
        return view('dashboard.trainings.edit', compact(['training']));
    }

    public function update($id, Request $request)
    {
        $training = Training::firstWhere(['id' => $id]);
        if (!$training) {
            abort(404);
        }

        $training->update(['content' => $request->get('description')]);
        return redirect()->back();
    }
}
