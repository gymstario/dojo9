<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
        if ($this->get('new_password') === null || $this->get('current_password')) {
            return [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email',
            ];
        }
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

    }
}
