<?php

namespace Tests\Unit;

use App\Order;
use App\Payments\PaymentFactory;
use App\Payments\PlaceToPay;
use DB;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class PaymentPlacetopayTest extends TestCase
{
    use CreatesApplication;

    /**
     @test
     */
    public function its_verify_factory_ok()
    {
        $this->app = $this->createApplication();

        $pay = PaymentFactory::initialize('placetopay');

        $class = get_class($pay);

        $this->assertTrue($class == 'App\Payments\PlaceToPay');
    }

    /**
     @test
     */
    public function its_verify_factory_exception()
    {
        $this->app = $this->createApplication();

        $message = '';
        try {
            $pay = PaymentFactory::initialize('fake-gateway');
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        $this->assertEquals('Not found method payment', $message);
    }

    /**
     @test
     */
    public function its_verify_placetopay_connection()
    {
        $this->app = $this->createApplication();

        $place = new PlaceToPay();
        $place->setConfig(config('payments.placetopay'));

        $class = new \ReflectionClass('App\Payments\PlaceToPay');
        $method = $class->getMethod('connection');
        $method->setAccessible(true);

        $con = $method->invokeArgs($place, []);

        $this->assertEquals('Dnetix\Redirection\PlacetoPay', get_class($con));
    }

    /**
     @test
     */
    public function its_verify_placetopay_transaction()
    {
        $this->app = $this->createApplication();

        $place = new PlaceToPay();
        $place->setConfig(config('payments.placetopay'));

        $order = Order::create([
            'customer_name' => 'Test name',
            'customer_mobile' => '55555555',
            'customer_email' => 'test@test.com',
            'method' => 'placetopay',
        ]);

        $order->products()->attach(1);

        $trans = $place->startTransaction($order);

        $this->assertTrue($trans->isSuccessful());

        $order->transaction_id = $trans->requestId();
        $order->transaction_url = $trans->processUrl();

        $order->save();

        return $order;
    }

    /**
      @test
      @depends its_verify_placetopay_transaction */
    public function its_verify_placetopay_query($order)
    {
        $payment = new PlaceToPay();
        $payment->setConfig(config('payments.placetopay'));
        $response = $payment->query($order);

        $result = $response->status()->toArray();

        $this->assertEquals('PENDING', $result['status']);

        DB::table('order_product')->where('order_id', $order->id)->delete();
        $order->delete();
    }

    /**
      @test
     */
    public function its_verify_placetopay_config()
    {
        $config = [
            'login' => sha1('login'),
        ];
        $payment = new PlaceToPay();
        $payment->setConfig($config);

        $gConfig = $payment->getConfig();

        $this->assertEquals($config['login'], $gConfig['login']);
    }
}
