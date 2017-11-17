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

    public function required($rule) {        
        if(strpos($rule, 'required') >= 0) {
          return $is_required = true;  
        } else {
          return $is_required = false;  
        }
    }

    public function testFullnameIsRequiredInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['full_name'];
        $is_required = $this->required($rule);

        $this->assertEquals(true, $is_required);
    }

    public function testEmailIsRequiredInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['email'];
        $is_required = $this->required($rule);

        $this->assertEquals(true, $is_required);
    }

    public function testMessageDescriptionIsRequiredInContactForm()
    {
        $rules = $this->rules;
        $rule = $rules['description'];
        $is_required = $this->required($rule);

        $this->assertEquals(true, $is_required);
    }

    // public function testAllowsOptionalParamaters()
    // {}

}
