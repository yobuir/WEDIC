<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function index()
    {
        return view('website.events.app', [
            'events' => Event::where('status', 'published')
                ->with('category')
                ->orderBy('created_at', 'asc')
                ->get(),
        ]);
    }

    public function view($slug)
    {
        $event=Event::where('status', 'published')
        ->where('slug', $slug)
        ->with('category')
        ->orderBy('created_at', 'asc')
        ->first();
        return view('website.events.view', [
            'event' => Event::where('status', 'published')
                ->where('slug', $slug)
                ->with('category')
                ->orderBy('created_at', 'asc')
                ->first(),
            'relatedEvents'=>Event::where('category_id', $event->category_id)
            ->where('id', '!=', $event->id)
            ->where('status', 'published')
            ->take(3)
            ->get()
        ]);
    }
}
