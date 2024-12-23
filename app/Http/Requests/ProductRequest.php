<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string|min:3|max:255",
            "description" => "required|string|min:3",
            "price" => "required|numeric|min:0",
            "quantity" => "required|integer|min:0",
            'category_id' => 'required|exists:categories,id',
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ];
    }
}
