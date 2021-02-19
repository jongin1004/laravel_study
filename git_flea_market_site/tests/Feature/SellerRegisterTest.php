<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellerRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    /** @test */
    public function get_response_seller_Register_site()
    {
        $response = $this->get('/agree');

        $response->assertStatus(200);
    }
}
