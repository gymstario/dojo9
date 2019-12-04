<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
{
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

            'first_name' => 'required',
			'last_name' => 'required',
			'dob' => 'required|date',
			'address' => 'required',
			'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'ssn_last_4' => 'required', // 4
            'title' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'enrolment' => 'required|date',
            
            
        ];
    }
}
