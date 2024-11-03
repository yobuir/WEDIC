<?php

namespace App\Livewire\Pages\Website\Testimonials;

use Livewire\Component;

class TestimonialView extends Component
{

    public $activeTestimonial = 0;



    public $testimonials = [
        [
            'quote' => 'WEDIC has transformed our approach to inclusion. Their expertise helped us create truly accessible programs.',
            'author' => 'Sarah Johnson',
            'role' => 'NGO Director',
            'image' => '/placeholder.jpg'
        ],
        [
            'quote' => 'The training and support we received has made a lasting impact on our organization.',
            'author' => 'David Mugisha',
            'role' => 'Community Leader',
            'image' => '/placeholder.jpg'
        ],
        [
            'quote' => 'Professional, knowledgeable, and deeply committed to creating positive change.',
            'author' => 'Marie Claire',
            'role' => 'Project Manager',
            'image' => '/placeholder.jpg'
        ]
    ];


    public function nextTestimonial()
    {
        $this->activeTestimonial = ($this->activeTestimonial + 1) % count($this->testimonials);
    }

    public function previousTestimonial()
    {
        $this->activeTestimonial = ($this->activeTestimonial - 1 + count($this->testimonials)) % count($this->testimonials);
    }

   

    public function render()
    {
        return view('livewire.pages.website.testimonials.testimonial-view');
    }
}
