<?php

namespace adahox\AbacatePay\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'frequency' => 'required|string|max:255',
            'methods' => 'required|array',
            'methods.*' => 'string',
            'products' => 'required|array',
            'products.*.externalId' => 'required|string',
            'products.*.name' => 'required|string',
            'products.*.description' => 'required|string',
            'products.*.quantity' => 'required|integer',
            'products.*.price' => 'required|integer',
            'returnUrl' => 'required|url|max:255',
            'completionUrl' => 'required|url|max:255',
            'customerId' => 'string',
            'customer' => 'array',
            'customer.name' => 'required|string|max:255',
            'customer.cellphone' => 'required|string|max:255',
            'customer.taxId' => 'required|string|max:255',
            'customer.email' => 'required|email|unique:abacatepay_customers,email',
        ];
    }

    public function messages()
    {
        return [
            'frequency.required' => 'O campo frequência é obrigatório',
            'frequency.string' => 'O campo frequência deve ser uma string',
            'frequency.max' => 'O campo frequência deve ter no máximo 255 caracteres',
            'methods.required' => 'O campo métodos é obrigatório',
            'methods.array' => 'O campo métodos deve ser um array',
            'methods.*.string' => 'O campo métodos deve ser uma string',
            'products.required' => 'O campo produtos é obrigatório',
            'products.array' => 'O campo produtos deve ser um array',
            'products.*.externalId.required' => 'O campo externalId é obrigatório',
            'products.*.externalId.string' => 'O campo externalId deve ser uma string',
            'products.*.name.required' => 'O campo nome é obrigatório',
            'products.*.name.string' => 'O campo nome deve ser uma string',
            'products.*.description.required' => 'O campo descrição é obrigatório',
            'products.*.description.string' => 'O campo descrição deve ser uma string',
            'products.*.quantity.required' => 'O campo quantidade é obrigatório',
            'products.*.quantity.integer' => 'O campo quantidade deve ser um inteiro',
            'products.*.price.required' => 'O campo preço é obrigatório',
            'products.*.price.integer' => 'O campo preço deve ser um inteiro',
            'returnUrl.required' => 'O campo returnUrl é obrigatório',
            'returnUrl.url' => 'O campo returnUrl deve ser uma url válida',
            'returnUrl.max' => 'O campo returnUrl deve ter no máximo 255 caracteres',
            'completionUrl.required' => 'O campo completionUrl é obrigatório',
            'completionUrl.url' => 'O campo completionUrl deve ser uma url válida',
            'completionUrl.max' => 'O campo completionUrl deve ter no máximo 255 caracteres',
            'customerId.string' => 'O campo customerId deve ser uma string',
            'customer.array' => 'O campo customer deve ser um array',
            'customer.name.required' => 'O campo nome é obrigatório',
            'customer.name.string' => 'O campo nome deve ser uma string',
            'customer.name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'customer.cellphone.required' => 'O campo celular é obrigatório',
            'customer.cellphone.string' => 'O campo celular deve ser uma string',
            'customer.cellphone.max' => 'O campo celular deve ter no máximo 255 caracteres',
            'customer.taxId.required' => 'O campo CPF é obrigatório',
            'customer.taxId.string' => 'O campo CPF deve ser uma string',
            'customer.taxId.max' => 'O campo CPF deve ter no máximo 255 caracteres',
            'customer.email.required' => 'O campo email é obrigatório',
            'customer.email.email' => 'O campo email deve ser um email válido',
            'customer.email.unique' => 'O email informado já está em uso',
        ];
    }
}
