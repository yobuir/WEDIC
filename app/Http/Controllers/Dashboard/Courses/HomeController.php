<?php

namespace App\Http\Controllers\Dashboard\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.courses.app');
    }

    public function edit($id)
    {
        $course = Course::firstWhere(['id' => $id]);

        if (!$course) {
            abort(404);
        }
        return view('dashboard.courses.edit', compact(['course']));
    }

    public function update($id, Request $request)
    {
        $course = Course::firstWhere(['id' => $id]);
        if (!$course) {
            abort(404);
        }

        $course->update(['description' => $request->get('description')]);
        return redirect()->back();
    }
}
