<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'name' => 'required|unique:authors,name',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'required|unique:authors,name,' . $this->route('id'),
        ];
    }
}
