<?php

namespace adahox\AbacatePay\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cellphone' => 'required|string|max:255',
            'taxId' => 'required|string|max:255',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.string' => 'O campo nome deve ser uma string',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'cellphone.required' => 'O campo celular é obrigatório',
            'cellphone.string' => 'O campo celular deve ser uma string',
            'cellphone.max' => 'O campo celular deve ter no máximo 255 caracteres',
            'taxId.required' => 'O campo CPF é obrigatório',
            'taxId.string' => 'O campo CPF deve ser uma string',
            'taxId.max' => 'O campo CPF deve ter no máximo 255 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido'
        ];
    }
}
