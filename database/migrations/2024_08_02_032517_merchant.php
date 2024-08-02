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
        Schema::create('profile_merchant', function (Blueprint $table) {
            $table->integer('merchant_id')->primary()->autoIncrement();
            $table->integer('user_id')->unique();
            $table->string('merchant_name');
            $table->text('merchant_address')->nullable();
            $table->string('merchant_contact')->nullable();
            $table->text('merchant_description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('menu_merchant', function (Blueprint $table) {
            $table->integer('menu_id')->primary()->autoIncrement();
            $table->integer('merchant_id');
            $table->string('menu_name');
            $table->text('menu_description')->nullable();
            $table->string('menu_picture')->nullable();
            $table->integer('menu_price')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_merchant');
        Schema::dropIfExists('menu_merchant');
    }
};
