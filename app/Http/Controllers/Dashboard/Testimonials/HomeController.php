<?php

namespace App\Http\Controllers\Dashboard\Testimonials;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.testimonial.app');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::firstWhere(['id' => $id]);
        if (!$testimonial) {
            abort(404);
        }
        return view('dashboard.testimonial.edit', compact(['testimonial']));
    }
}
