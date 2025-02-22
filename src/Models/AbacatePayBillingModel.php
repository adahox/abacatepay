<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbacatePayBillingModel extends Model
{
    protected $table = 'abacatepay_billings';

    protected $fillable = [
        'payment_id',
        'status',
        'customer_taxId',
        'customer_name',
        'customer_email',
        'customer_cellphone',
        'payment_method',
        'frequency',
        'amount',
        'fee',
        'produto_id',
        'produto_externalId',
        'produto_quantity',
    ];

    public function addIfNotExist($customer): AbacatePayBillingModel
    {
        return $this->firstOrCreate($customer);
    }

}
