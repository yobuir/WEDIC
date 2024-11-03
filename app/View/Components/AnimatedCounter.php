<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnimatedCounter extends Component
{
    public $target;
    public $suffix;

    public function __construct($target, $suffix = '')
    {
        $this->target = $target;
        $this->suffix = $suffix;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animated-counter');
    }
}
