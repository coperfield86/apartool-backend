<?php

namespace App\Http\Requests\Apartment;

use App\Http\Requests\FormRequest;

class CreateApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|string',
            'quantity' => 'required|numeric|min:0',
            'description' => 'required|string',
            'active' => 'boolean',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
