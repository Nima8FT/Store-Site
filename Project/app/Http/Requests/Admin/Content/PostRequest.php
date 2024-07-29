<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'title' => 'required|min:2|max:120',
                'summary' => 'required|min:5',
                'body' => 'required|min:5',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'commentable' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'published_at' => 'required|numeric',
                'category_id' => 'required|numeric|exists:post_categories,id',
                // 'author_id' => 'required|numeric|exists:users,id',
            ];
        } else {
            return [
                'title' => 'required|min:2|max:120',
                'summary' => 'required|min:5',
                'body' => 'required|min:5',
                'image' => 'image|mimes:jpg,png,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'commentable' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'published_at' => 'required|numeric',
                'category_id' => 'required|numeric|exists:post_categories,id',
                // 'author_id' => 'required|numeric|exists:users,id',
            ];
        }
    }
}
