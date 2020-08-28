<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Product;
use App\Payments\PaymentFactory;

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
        $this->orderRepository->attatchProduct($order, $request->all());
        
        $payment = PaymentFactory::initialize('placetopay');
        
        $response =  $payment->startTransaction($order);

        if ($response->isSuccessful()) {
            $this->orderRepository->transactionData($order, $response->requestId(), $response->processUrl());

            return redirect()->away($order->transaction_url);
        }

        return redirect()->route('order.index')->with([
            'message' => $response->status()->message(),
            'alert-type' => 'warning'
        ]);
        
        return redirect()->route('order.index')->with([
            'message' => '',
            'alert-type' => 'success'
        ]);
    }
}
