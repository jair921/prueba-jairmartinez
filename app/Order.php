<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name', 'customer_mobile', 'customer_email', 'transaction_id', 'transaction_url'];
    
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
