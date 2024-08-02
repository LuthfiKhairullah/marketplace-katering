<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id')->primary()->autoIncrement();;
            $table->string('customer_id');
            $table->string('merchant_id');
            $table->string('order_invoice');
            $table->date('order_delivery_date');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('detail_orders', function (Blueprint $table) {
            $table->integer('detail_order_id')->primary()->autoIncrement();;
            $table->integer('order_id');
            $table->string('detail_order_name');
            $table->integer('detail_order_qty');
            $table->integer('detail_order_price');
            $table->integer('detail_order_total_price');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('detail_orders');
    }
};
