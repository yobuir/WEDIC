<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        return view('website.projects.app', [
            'projects' => Project::where('status', 'published')
                ->with('category')
                ->with('partner')
                ->orderBy('created_at', 'asc')
                ->get(),
            'testimonials' => Testimonial::all(),
        ]);
    }

    public function view($slug)
    {
        return view('website.projects.view', [
            'project' => Project::where('status', 'published')
                ->with('category')
                ->with('partner')
                ->where('slug', $slug)
                ->orderBy('created_at', 'asc')
                ->first(),
        ]);
    }
}
