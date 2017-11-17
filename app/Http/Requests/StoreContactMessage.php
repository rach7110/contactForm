<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessage extends FormRequest
{
      /**
     * The URI to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirect = '/#contact';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            'description'   => 'required',
            'telephone'     => 'nullable|max:25',
        ];
    }
}
