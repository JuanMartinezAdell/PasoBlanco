<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $products = Product::paginate(9);

        $filters = $request->all('search');

        return Inertia::render('welcome', compact('products', 'filters'));

        //return Inertia::render('Products/IndexProducts', compact('products', 'filters'));
    }
}
