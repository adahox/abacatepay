<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbacatePayBillingModel extends Model
{
    protected $table = 'abacatepay_billings';

    protected $fillable = [
        'paymentId',
        'status',
        'customer_taxId',
        'customer_name',
        'customer_email',
        'customer_cellphone',
        'payment_method',
        'frequency',
        'amount',
        'fee',
        'productId',
        'product_externalId',
        'product_quantity',
    ];

    public function addIfNotExist($billing): AbacatePayBillingModel
    {
        return $this->firstOrCreate($billing);
    }

}
