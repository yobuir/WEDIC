<?php

namespace App\Livewire\Pages\Website\Servicess;

use Livewire\Component;

class ServiceView extends Component
{

    public $activeTab = 0;


    public $services = [
        [
            'title' => 'Capacity Development',
            'icon' => 'book-open',
            'items' => [
                'Training Module Development',
                'Need Assessment',
                'Training Facilitation',
                'Event Management',
                'Entrepreneurship Training'
            ],
            'color' => 'blue'
        ],
        [
            'title' => 'Monitoring & Evaluation',
            'icon' => 'bar-chart-2',
            'items' => [
                'Mid-Term Evaluation',
                'End Line Evaluation',
                'Project Monitoring',
                'Compliance Auditing'
            ],
            'color' => 'purple'
        ],
        [
            'title' => 'Social Economic Development',
            'icon' => 'target',
            'items' => [
                'Baseline Studies',
                'Policy Reviews',
                'Impact Assessment',
                'Feasibility Studies'
            ],
            'color' => 'pink'
        ]
    ];
    public function setActiveTab($index)
    {
        $this->activeTab = $index;
    }
    public function render()
    {
        return view('livewire.pages.website.servicess.service-view');
    }
}
