<?php

namespace App\Http\Controllers\Dashboard\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('dashboard.projects.app');
    }

    public function edit($id)
    {
        $project = Project::firstWhere(['id' => $id]);
        if (!$project) {
            abort(404);
        }
        return view('dashboard.projects.edit', compact(['project']));
    }

    public function update($id, Request $request)
    {
        $project = Project::firstWhere(['id' => $id]);
        if (!$project) {
            abort(404);
        }

        $project->update(['header' => $request->get('summary'), 'content' => $request->get('description')]);
        return redirect()->back();
    }
}
