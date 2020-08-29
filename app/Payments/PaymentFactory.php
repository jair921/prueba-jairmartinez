<?php

namespace App\Payments;

class PaymentFactory
{
    public static function initialize($type)
    {
        switch ($type) {
            case 'placetopay':
                $pay = new PlaceToPay();
                $pay->setConfig(config('payments.' . $type));
                return $pay;
                break;
        }
        throw new \Exception('Not found method payment');
    }
}
