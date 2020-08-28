<?php

namespace App\Payments;

class PlaceToPay implements PaymentInterface
{

    private $config;

    private function connection()
    {
      $config = $this->getConfig();
      $placetopay = new \Dnetix\Redirection\PlacetoPay([
            'login' => $config['login'],
            'tranKey' => $config['trankey'],
            'url' => $config['url'],
            'rest' => [
                'timeout' => 45,
                'connect_timeout' => 30,
            ]
        ]);

        return $placetopay;
    }

    public function startTransaction(\App\Order $order)
    {

        $placetopay = $this->connection();

        $reference = $order->id;
        $requestPlace = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Payment order '.$reference,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $order->price(),
                ],
            ],
            'expiration' => date('c', strtotime('+7 days')),
            'returnUrl' => route('order.show', $reference),
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        return $placetopay->request($requestPlace);
    }

    public function query(\App\Order $order)
    {
        $placetopay = $this->connection();

        return $placetopay->query($order->transaction_id);
    }

    public function setConfig(array $config) {
        $this->config = $config;
    }

    public function getConfig() {
        return $this->config;
    }

}

