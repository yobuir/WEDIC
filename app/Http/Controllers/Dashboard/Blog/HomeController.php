<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.blog.app');
    }

    public function edit($id)
    {
        $blog = Blog::firstWhere(['id' => $id]);
        if (!$blog) {
            abort(404);
        }
        return view('dashboard.blog.edit', compact(['blog']));
    }

    public function update($id, Request $request)
    {
        $blog = Blog::firstWhere(['id' => $id]);
        if (!$blog) {
            abort(404);
        }

        $blog->update(['header' => $request->get('summary'), 'content' => $request->get('description')]);
        return redirect()->back();
    }
}
