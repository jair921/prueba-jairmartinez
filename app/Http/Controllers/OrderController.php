<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Product;

class OrderController extends Controller
{
    public function index(OrderRequest $request)
    {
        $product = $request->product();

        return view('orders.index', compact('product'));
     }
     
    public function create(StoreOrderRequest $request)
    {
         
    }
}
