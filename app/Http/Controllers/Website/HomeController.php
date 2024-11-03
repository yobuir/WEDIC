<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Event;
use  App\Models\Blog;
use  App\Models\Partners;
use  App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{

    public $activeTestimonial = 0;
    public $activeTab = 0;

    public $services = [
        [
            'title' => 'Capacity Development',
        ],
        [
            'title' => 'Monitoring & Evaluation',
        ],
        [
            'title' => 'Social Economic Development',
        ]
    ];


    public $projects = [
        [
            'title' => "Women's Economic Empowerment",
            'description' => 'Empowering women through financial literacy and business skills.',
            'category' => 'Economic Development',
            'impact' => '500+ women trained',
            'image' => '/placeholder.jpg'
        ],
        [
            'title' => 'Disability Inclusion Program',
            'description' => 'Creating accessible workplaces and inclusive policies.',
            'category' => 'Inclusion',
            'impact' => '20+ organizations supported',
            'image' => '/placeholder.jpg'
        ],
        [
            'title' => 'Youth Leadership Initiative',
            'description' => 'Building future leaders through mentorship and training.',
            'category' => 'Leadership',
            'impact' => '100+ youth empowered',
            'image' => '/placeholder.jpg'
        ]
    ];

    public function index()
    {


        return view('welcome', [
            'events' => Event::limit(2)->with('category')->where('status', '!=', 'draft')->limit(3)->get(),
            'blogs' => Blog::where('status', 'published')->with('category')->with('author')->get(),
            'partners' => Partners::where('status', 'published')->orderBy('created_at', 'desc')->get(),
            'project' => Project::with('category')->with('partner')->orderBy('created_at', 'desc')->first(),
            // 'projects' => Project::with('category')->with('partner')->orderBy('created_at', 'desc')->where('status', '=', 'published')->limit(3)->get(),
            'services' => $this->services,
            'projects' => $this->projects,
            // 'testimonials' => Testimonial::limit(6)->orderBy('created_at', 'desc')->get(),

        ]);
    }
}
