<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductStoreRequest extends FormRequest
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
        $rule = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'image_base' => 'required|mimes:jpeg,jpg,png,gif',
            'image_small' => 'nullable|mimes:jpeg,jpg,png,gif',
            'image_thumbnail' => 'nullable|mimes:jpeg,jpg,png,gif',
            'image_swatch' => 'nullable|mimes:jpeg,jpg,png,gif',
            'stock_quantity.*' => 'required',
        ];

        if (request('id')) {
            $rule['image_base'] = 'nullable|mimes:jpeg,jpg,png,gif';
        }

        return $rule;
    }
}
