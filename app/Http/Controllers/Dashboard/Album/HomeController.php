<?php

namespace App\Http\Controllers\Dashboard\Album;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.album.app');
    }

    public function edit($id)
    {
        $album = Album::firstWhere(['id' => $id]);
        if (!$album) {
            abort(404);
        }
        return view('dashboard.album.edit', compact(['album']));
    }
}
