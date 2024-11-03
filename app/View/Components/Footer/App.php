<?php

namespace App\View\Components\Footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    
    public function render(): View|Closure|string
    {
        return view('components.footer.app');
    }
}
