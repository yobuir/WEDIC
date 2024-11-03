<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $firstBlogFeatured = Blog::where('status', 'published')
            ->with('category')
            ->with('author')
            ->orderBy('created_at', 'asc')
            ->first();
        $fistTwoBlogs = Blog::where('status', 'published')
            ->where('id', '!=', $firstBlogFeatured?->id)
            ->with('category')
            ->with('author')
            ->orderBy('created_at', 'asc')
            ->limit(2)
            ->get();
        $fistTwoBlogsIds = $fistTwoBlogs->pluck('id');

        return view('website.news.app', [
            'blogs' => Blog::where('status', 'published')
                ->with('category') 
                ->with('author')
                ->orderBy('created_at', 'asc')
                ->get(),
            'firstBlogFeatured' => $firstBlogFeatured,
            'fistTwoBlogs' => $fistTwoBlogs,
            'categories' => Category::where('status', 'published')
                ->latest()
                ->get(),
        ]);
    }

    public function category($category)
    {

        return view('website.news.categories.app', [
            'blogs' => Blog::where('status', 'published')
                ->with('category')
                ->with('author')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category);
                })
                ->orderBy('created_at', 'asc')
                ->get(),
            'category' => Category::where('id', $category)->first(),
            'categories' => Category::where('status', 'published')
                ->latest()
                ->get(),
            'Related_posts' => Blog::where('status', 'published')
                ->where('featured', 1)
                ->with('category')
                ->with('author')
                ->orderBy('created_at', 'asc')
                ->first()
        ]);
    }




    public function view($blog)
    {

        $blog = Blog::where('status', 'published')
            ->with('category')
            ->with('author')
            ->orderBy('created_at', 'asc')
            ->where('slug', $blog)
            ->first();
        return view('website.news.view', [
            'blog' => $blog,
            'categories' => Category::where('status', 1)
                ->latest()
                ->get(),
            'Related_posts' => Blog::where('status', 'published')

                ->with('category')
                ->with('author')
                ->where('slug', '!=', $blog)
                ->whereHas('category', function ($query) use ($blog) {
                    $query->where('id', $blog?->category_id);
                })
                ->orderBy('created_at', 'asc')
                ->limit(10)->get(),
            'categories' => Category::where('status', 1)
                ->latest()
                ->get(),
        ]);
    }
}
