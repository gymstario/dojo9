<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StudioSetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('is-owner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'studio.name' => 'required',
            'studio.phone' => 'required',
            'studio.email' => 'required|email',
            'studio.address' => 'required',
            'studio.city' => 'required',
            'studio.state' => 'required',
            'studio.zip' => 'required|digits:5',
            'studio.tax' => 'required',
            'studio.mcc' => 'required',
            'studio.url' => 'required|url',
            'studio.date' => 'required|date',
            'store_front' => 'required|file',
            'store_back' => 'required|file',
            'studio.routing' => 'required',
            'studio.account' => 'required',
            'owner.firstName' => 'required',
            'owner.lastName' => 'required',
            'owner.ssn' => 'required|digits:4',
            'owner.title' => 'required',
            'owner.phone' => 'required',
            'owner.email' => 'required|email',
            'owner.address' => 'required',
            'owner.city' => 'required',
            'owner.state' => 'required',
            'owner.zip' => 'required|digits:5',
            'owner_front' => 'required|file',
            'owner_back' => 'required|file',
        ];
    }
}
