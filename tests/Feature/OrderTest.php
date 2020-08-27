<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{

     /** @test */
    public function it_visit_page_of_order()
    {
        $response = $this->get('/order?product=1');

        $response->assertStatus(200);
    }
}
