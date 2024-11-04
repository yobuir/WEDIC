<?php

namespace App\Http\Controllers\Dashboard\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.store.app');
    }


    public function edit($id)
    {
        $product = Product::firstWhere(['id' => $id]);
        if (!$product) {
            abort(404);
        }
        return view('dashboard.store.edit', compact(['product']));
    }


    public function update($id, Request $request)
    {
        $product = Product::firstWhere(['id' => $id]);
        if (!$product) {
            abort(404);
        }

        $product->update(['description' => $request->get('description')]);
        return redirect()->back();
    }
}
