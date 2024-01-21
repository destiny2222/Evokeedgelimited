<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('currency')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('email_supplier')->nullable();
            $table->string('bank_amount_name')->nullable();
            $table->boolean('paid')->default(false);
            $table->string('bank_account_number')->nullable();
            $table->string('bank_swift_code')->nullable();
            $table->string('bank_route_number')->nullable();
            $table->string('bank_reference_number')->nullable();
            $table->integer('total_amount')->default(0);
            $table->integer('amount')->default(0);
            $table->string('recipient')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('payment_method')->nullable();
            $table->boolean('done')->default(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandises');
    }
};
