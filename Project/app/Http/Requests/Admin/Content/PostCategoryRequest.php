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
        if ($this->isMethod("POST")) {
            return [
                'name' => 'required',
                'description' => 'required',
                'slug' => 'nullable',
                'image' => 'required',
                'status' => 'required|numeric',
                'tags' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'description' => 'required',
                'slug' => 'nullable',
                'image' => '',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
    }
}
