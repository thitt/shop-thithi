<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:100',
            'description' => 'max:1000',
        ];

        if (request('type_category') == IS_CHILD_CATEGORY) {
            $rules['parent_id'] = 'required';
        }

        return $rules;
    }
}
