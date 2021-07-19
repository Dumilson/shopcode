<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\Product;
use App\Models\Product as ModelsProduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = ModelsProduct::latest()->paginate(5);
        return view('shop.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show(ProductController $product)
    {
        return view('admin.products.show', compact('product'));
    }
}
