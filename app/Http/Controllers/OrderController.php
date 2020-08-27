<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Product;

class OrderController extends Controller
{

    private $orderRepository;
    private $productRepository;

    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    
    public function index(Request $request)
    {
        $product = $this->productRepository->find($request->product);

        return view('orders.index', compact('product'));
     }
     
    public function create(StoreOrderRequest $request)
    {
        $order = $this->orderRepository->create($request->all());
        $this->orderRepository->attatchProduct($order->id, $request->all());
        
        return redirect()->route('order.index')->with([
            'message' => '',
            'alert-type' => 'success'
        ]);
    }
}
