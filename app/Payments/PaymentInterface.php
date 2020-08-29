<?php

namespace App\Payments;

interface PaymentInterface
{
    public function startTransaction(\App\Order $order);
    public function query(\App\Order $order);
    public function setConfig(array $config);
    public function getConfig();
}
