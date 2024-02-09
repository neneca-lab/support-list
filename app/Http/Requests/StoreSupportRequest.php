<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupportRequest extends FormRequest
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
        $rules = [
            'subject' => [
                'required',
                'unique:supports',
                'max:255',
                'min:3'
            ],
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ],
        ];

        if($this->method() === 'PUT'){
            $rules['subject'] = [
              'required',
              'min:3',
              'max:255',
//              'unique:supports,subject,{$this->id},id'
            Rule::unique('supports')->ignore($this->id),
            ];
        }

        return $rules;
    }
}
