<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Requests\StoreContactForm;

class MessageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function required($rule) {        
        if(strpos($rule, 'required') >= 0) {
          return $is_required = true;  
        } else {
          return $is_required = false;  
        }
    }

    public function testFullnameIsRequiredInContactForm()
    {
        $validation = new StoreContactForm;
        $rules = $validation->rules();
        $rule = $rules['full_name'];

        $is_required = $this->required($rule);

        $this->assertEquals(true, $is_required);
    }

    public function testEmailIsRequiredInContactForm()
    {
        $validation = new StoreContactForm;
        $rules = $validation->rules();
        $rule = $rules['email'];

        $is_required = $this->required($rule);

        $this->assertEquals(true, $is_required);
    }

    public function testMessageDescriptionIsRequiredInContactForm()
    {
        $validation = new StoreContactForm;
        $rules = $validation->rules();
        $rule = $rules['description'];

        $is_required = $this->required($rule);

        $this->assertEquals(true, $is_required);
    }

    // public function testAllowsOptionalParamaters()
    // {}

}
