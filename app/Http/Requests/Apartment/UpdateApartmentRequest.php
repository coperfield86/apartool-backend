<?php

namespace App\Http\Requests\Apartment;

use App\Http\Requests\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'name' => 'string',
            'quantity' => 'numeric|min:0',
            'description' => 'string',
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
