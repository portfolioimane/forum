<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class ReplyTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    function test_it_has_an_owner()
    {
        $reply=factory('App\Reply')->create();
        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
