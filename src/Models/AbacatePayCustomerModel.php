<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbacatePayCustomerModel extends Model
{
    protected $table = 'abacatepay_customers';

    protected $fillable = [
        'name',
        'cellphone',
        'taxId',
        'email',
    ];

    public function addIfNotExist($customer): AbacatePayCustomerModel
    {
        return $this->firstOrCreate($customer);
    }

}
