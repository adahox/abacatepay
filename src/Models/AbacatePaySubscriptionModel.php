<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbacatePaySubscriptionModel extends Model
{
    protected $table = 'abacatepay_subscriptions';

    protected $fillable = [
        'customer_taxId',
        'product_externalId',
        'amount',
        'payment_method',
        'paid_at',
        'expires_at',
    ];

    public function addIfNotExist($subscription): AbacatePaySubscriptionModel
    {
        return $this->firstOrCreate($subscription);
    }

}
