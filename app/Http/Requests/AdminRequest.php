<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:20|string|min:3',
            'status' => 'required|boolean',
        ]
        +
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
    protected function update(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];
    }
}
