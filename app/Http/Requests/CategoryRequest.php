<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'featured' => 'required|boolean',
            'latest' => 'required|boolean',
            'header' => 'required|boolean',
            'status' => 'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'title' => 'required|max:255|min:3|unique:categories,title',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'required|max:255|min:3|unique:categories,title,' . $this->route('id'),
        ];
    }
}
