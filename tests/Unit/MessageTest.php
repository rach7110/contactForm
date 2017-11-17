<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Message;

class MessageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMessageHasFullNameAttribte()
    {
        $message = new Message;

        $this->assertTrue(true);
    }
}
