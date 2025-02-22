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

        Schema::create('abacatepay_billings', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('status');
            $table->string('customer_taxId');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_cellphone');
            $table->string('payment_method');
            $table->string('frequency');
            $table->string('amount');
            $table->string('fee');
            $table->string('product_id');
            $table->string('product_externalId');
            $table->string('product_quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abacatepay_customers');
    }
};
