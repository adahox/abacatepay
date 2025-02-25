<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abacatepay_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('customer_taxId');
            $table->string('product_externalId');
            $table->integer('amount');
            $table->string('payment_method');
            $table->date('paid_at');
            $table->date('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
