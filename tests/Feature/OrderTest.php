<?php

namespace Tests\Feature;

use DB;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    public function it_visit_page_of_order()
    {
        $response = $this->get('/order?product=1');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_display_404_page_of_order()
    {
        $response = $this->get('/order?product=0');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_creates_a_new_order()
    {
        $this->post('/order', [
            'customer_name' => 'Jair',
            'customer_mobile' => '3004038519',
            'customer_email' => 'martinez.jair8@gmail.com',
            'method' => 'placetopay',
            'product' => 1,
        ])->assertRedirect();

        return DB::table('orders')->orderBy('id', 'desc')->first()->id;
    }

    /**
      @test
      @depends it_creates_a_new_order */
    public function it_load_show_order($id)
    {
        $response = $this->get('/order/' . $id);

        $response->assertStatus(200);

        DB::table('orders')->where('id', $id)->delete();
    }

    /** @test */
    public function it_visit_list_orders()
    {
        $response = $this->get('/orders');

        $response->assertStatus(200);
    }
}
