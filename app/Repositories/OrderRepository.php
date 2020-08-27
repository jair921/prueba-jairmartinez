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

}

