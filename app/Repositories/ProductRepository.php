<?php

namespace App\Repositories;

use App\Product;

class ProductRepository extends BaseRepository
{

    public function getFieldsSearchable()
    {

    }

    public function model()
    {
        return Product::class;
    }

}

