<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        return [
            'user_id' => 'integer|exists:users,id',
            'category_id' => 'integer|exists:categories,id',
            'region_id' => 'integer|exists:regions,id',
            'title' => 'string|max:255',
            'body' => 'string',
            'price' => 'numeric|min:0',
            'phone' => 'string|max:255',
            'address' => 'string|max:255',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
