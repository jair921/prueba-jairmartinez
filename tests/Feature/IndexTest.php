<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function it_visit_page_of_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
