<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category' => 'required|array|min:1',
            'category.*' => 'exists:categories,id',
            'sub_category' => 'nullable|array',
            'sub_category.*' => 'exists:sub_categories,id',
            'description' => 'required|string',
            'keywords' => 'required|array|min:1',
            'keywords.*' => 'string|max:255',
            'tags' => 'required|array|min:1',
            'tags.*' => 'string|max:255',
            'references' => 'nullable|array|min:1',
            'references.*' => 'url|max:255',
            'author' => 'required|exists:authors,id',
            'main' => 'required|boolean',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
            'trending' => 'required|boolean',
            'post_date' => 'required',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|string|min:3|max:255|unique:posts,title',
            'image' => 'required|exists:tmp_files,id',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|string|min:3|max:255|unique:posts,title,' . $this->route('id'),
            'image' => 'nullable|exists:tmp_files,id',
        ];
    }
}
