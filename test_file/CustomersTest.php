<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Qna;

class CustomersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_see_the_customers_list()
    {
        $response = $this->get('/home')
            ->assertRedirect('/login');            
    }

    /** @test */
    public function authenticated_users_can_see_the_customers_lsit()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user);

        $response = $this->get('/home')
            ->assertOk();
    }
    
}
 
