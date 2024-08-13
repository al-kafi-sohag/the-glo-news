<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequset extends FormRequest
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
            'category' => 'required|exists:categories,id',
            'featured' => 'required|boolean',
            'latest' => 'required|boolean',
            'header' => 'required|boolean',
            'status' => 'required|in:0,1',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|max:255|min:3|unique:sub_categories,title',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|max:255|min:3|unique:sub_categories,title,' . $this->route('id'),
        ];
    }
}
