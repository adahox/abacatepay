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
            'customerId' => 'required|string',
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
            'customerId.required' => 'O campo customerId é obrigatório',
            'customerId.string' => 'O campo customerId deve ser uma string',
        ];
    }
}
