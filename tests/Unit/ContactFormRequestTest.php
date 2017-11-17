<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Requests\StoreContactForm;

class ContactFormRequestTest extends TestCase
{
   public function setUp()
   {
        parent::setUp();
        $this->validation = new StoreContactForm;
        $this->rules = $this->validation->rules();
   }

    public function status($rule, $level) {        
        if(strpos($rule, $level) >= 0) {
          return $status = true;  
        } else {
          return $status = false;  
        }
    }

    public function testFullnameIsRequiredInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['full_name'];
        $is_required = $this->status($rule, 'required');

        $this->assertEquals(true, $is_required);
    }

    public function testEmailIsRequiredInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['email'];
        $is_required = $this->status($rule, 'required');

        $this->assertEquals(true, $is_required);
    }

    public function testMessageDescriptionIsRequiredInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['description'];
        $is_required = $this->status($rule, 'required');

        $this->assertEquals(true, $is_required);
    }

    public function testTelephoneIsOptionalInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['telephone'];
        $is_optional = $this->status($rule, 'nullable');

        $this->assertEquals(true, $is_optional);
    }

}
