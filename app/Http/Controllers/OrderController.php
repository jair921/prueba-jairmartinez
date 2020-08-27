<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class OrderController extends Controller
{
    public function index(Request $request){
        $product = false;
        if(isset($request->product)){
            $product = Product::find($request->product);
        }

        return view('orders.index', compact('product'));
     }
}
