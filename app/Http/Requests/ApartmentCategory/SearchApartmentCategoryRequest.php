<?php

namespace App\Http\Requests\ApartmentCategory;

use App\Http\Requests\FormRequest;

class SearchApartmentCategoryRequest extends FormRequest
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
            'page' => 'numeric|min:1',
            'per_page' => 'numeric|min:1',
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
