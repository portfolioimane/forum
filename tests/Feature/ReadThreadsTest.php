<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp() :void{
        parent::setUp();
        $this->thread=factory('App\Thread')->create();
    }
    public function test_a_user_can_browse_threads()
    {
        $response = $this->get('/threads')->assertSee($this->thread->title);
    }
     public function test_a_user_can_read_a_single_thread(){
        $response=$this->get('/threads/' . $this->thread->id)->assertSee($this->thread->title);
     }
     function test_a_user_can_read_replies_that_are_associated_with_a_thread(){
        $reply=factory('App\Reply')->create(['thread_id'=> $this->thread->id]);
        $this->get('/threads/' . $this->thread->id)->assertSee($reply->body);
     }
}
