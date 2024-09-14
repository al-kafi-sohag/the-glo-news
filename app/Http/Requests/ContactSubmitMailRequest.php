<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactSubmitMailRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10|max:10000',

        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [

        ];
    }
    protected function update(): array
    {
        return [

        ];
    }
}
