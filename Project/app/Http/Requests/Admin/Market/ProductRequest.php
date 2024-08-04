<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->isMethod("POST")) {
            return [
                'name' => 'required',
                'introduction' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'weight' => 'required|integer',
                'length' => 'required|integer',
                'width' => 'required|integer',
                'height' => 'required|integer',
                'price' => 'required|numeric',
                'brand_id' => 'required|exists:brands,id',
                'category_id' => 'required|exists:product_categories,id',
                'published_at' => 'required|numeric',
                'meta_key.*' => 'required',
                'meta_value.*' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'introduction' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'weight' => 'required|integer',
                'length' => 'required|integer',
                'width' => 'required|integer',
                'height' => 'required|integer',
                'price' => 'required|integer',
                'brand_id' => 'required|exists:brands,id',
                'category_id' => 'required|exists:product_categories,id',
                'published_at' => 'required|numeric',
                'meta_key.*' => 'required',
                'meta_value.*' => 'required',
            ];
        }
    }
}
