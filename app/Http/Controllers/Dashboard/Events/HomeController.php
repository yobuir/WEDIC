<?php

namespace App\Http\Controllers\Dashboard\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.events.app');
    }

    public function edit($id)
    {
        $event = Event::firstWhere(['id' => $id]);
        if (!$event) {
            abort(404);
        }
        return view('dashboard.events.edit', compact(['event']));
    }

    public function update($id, Request $request)
    {
        $event = Event::firstWhere(['id' => $id]);
        if (!$event) {
            abort(404);
        }

        $event->update(['header' => $request->get('summary'), 'content' => $request->get('description')]);
        return redirect()->back();
    }
}
