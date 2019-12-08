<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudioRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'tax_id' => 'required',
            'mcc' => 'required',
            'url' => 'required|url',
            'description' => 'required',
            'date' => 'required|date',
            'ip' => 'required',
        ];
    }
}
