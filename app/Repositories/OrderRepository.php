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

    public function attatchProduct($id, $data)
    {
        $order = $this->find($id);
        $order->products()->attach($data['product']);
        return $order;
    }
}

