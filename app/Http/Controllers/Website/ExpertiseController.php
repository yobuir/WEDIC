<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{

    public $areas = [
        [
            'title' => 'Social Protection',
            'icon' => 'shield',
            'description' => 'Comprehensive programs and strategies for vulnerable populations',
            'key_points' => [
                'Social Safety Nets',
                'Vulnerable Population Support',
                'Community Development',
                'Social Security Systems'
            ]
        ],
        [
            'title' => 'Disability Rights',
            'icon' => 'universal-access',
            'description' => 'Advocating for and implementing inclusive policies and practices',
            'key_points' => [
                'Accessibility Standards',
                'Rights Advocacy',
                'Inclusive Design',
                'Policy Development'
            ]
        ],
        [
            'title' => 'Gender Equality',
            'icon' => 'venus-mars',
            'description' => 'Promoting equal opportunities and rights across genders',
            'key_points' => [
                'Gender Mainstreaming',
                'Equal Opportunity Programs',
                'Gender Analysis',
                'Policy Implementation'
            ]
        ],
        [
            'title' => 'Women Empowerment',
            'icon' => 'female',
            'description' => "Supporting women's economic and social advancement",
            'key_points' => [
                'Economic Empowerment',
                'Leadership Development',
                'Skills Training',
                'Entrepreneurship Support'
            ]
        ],
        [
            'title' => 'Youth Development',
            'icon' => 'users',
            'description' => 'Nurturing the next generation of leaders',
            'key_points' => [
                'Skills Development',
                'Leadership Training',
                'Career Guidance',
                'Entrepreneurship Programs'
            ]
        ]
    ];

    public function index()
    {
        return view('website.expertise.app', [
            'areas' => $this->areas
        ]);
    }
}
