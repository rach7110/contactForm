<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Message;

class MessageTest extends TestCase
{
   public function setup()
   {
        parent::setUp();
        $this->message = new Message;
   }

    public function testMessageHasFullname()
    {
        $this->message->full_name = 'Sam Smith';
        $this->assertEquals('Sam Smith', $this->message->full_name);
    }

    public function testMessageHasEmail()
    {
        $this->message->email = 'sam@smith.com';
        $this->assertEquals('sam@smith.com', $this->message->email);
    }

    public function testMessageHasTelephone()
    {
        $this->message->telephone = '322-444-6555';
        $this->assertEquals('322-444-6555', $this->message->telephone);
    }

    public function testMessageHasDescription()
    {
        $this->message->description = 'The grey fox jumps over the fence';
        $this->assertEquals('The grey fox jumps over the fence', $this->message->description);
    }
}
