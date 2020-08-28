<?php

namespace App\Repositories;

use App\Order;

class OrderRepository extends BaseRepository
{

    public function getFieldsSearchable()
    {

    }

    public function model()
    {
        return Order::class;
    }

    public function attatchProduct(&$order, $data)
    {
        $order->products()->attach($data['product']);
    }

    public function transactionData(Order &$order, $tId, $tUrl)
    {
        $order->transaction_id = $tId;
        $order->transaction_url = $tUrl;
        $order->save();
    }
}

