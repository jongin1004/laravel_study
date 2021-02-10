<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Qna;
use App\Models\User;

class PostControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_tasks()
    {
        //Given we have task in the database
        $qna = Qna::factory()->create();

        //When user visit the tasks page
        $response = $this->get('/qna');
        
        //He should be able to read the task
        $response->assertSee($qna->title);
    }

    /** @test */
    public function a_user_can_read_single_task()
    {
        //Given we have task in the database
        $qna = Qna::factory()->create();
        //When user visit the task's URI
        $response = $this->get('/qna/'.$qna->id);
        //He can see the task details
        $response->assertSee($qna->title);            
    }

}
