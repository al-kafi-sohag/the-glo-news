<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementMailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'=>'required|string|unique:advertisements,key|max:255',
            'key'=>'required|string||unique:advertisements,key|max:255',
            'details'=>'nullable'

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
