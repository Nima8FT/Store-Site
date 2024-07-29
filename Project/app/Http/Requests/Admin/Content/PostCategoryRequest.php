<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
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
        //you use regex
        if ($this->isMethod("POST")) {
            return [
                'name' => 'required|max:120|min:2',
                'description' => 'required',
                'image' => 'required|image|mimes:png,jpeg,jpg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:png,jpeg,jpg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
    }
}
