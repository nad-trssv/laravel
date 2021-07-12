<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GoodsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_goods_list_status()
    {
        $response = $this->get('/goods');

        $response->assertStatus(200);
    }
}
