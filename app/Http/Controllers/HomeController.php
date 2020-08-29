<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);

        return view('welcome', compact('products'));
    }
}
