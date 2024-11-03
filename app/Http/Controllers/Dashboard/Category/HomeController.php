<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.category.app');
    }
    public function edit($id)
    {
        $category=Category::firstWhere(['id' => $id]);
        if(!$category){
            abort(404);
        }
        return view('dashboard.category.edit',compact(['category']));
    }
}
