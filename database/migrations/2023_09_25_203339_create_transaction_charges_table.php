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
        Schema::create('transaction_charges', function (Blueprint $table) {
            $table->id();
            $table->integer('tuition_charge_amount')->default(0);
            $table->integer('visa_charge_amount')->default(0);
            $table->integer('corporate_charge_amount')->default(0);
            $table->integer('merchant_charge_amount')->default(0);
            $table->integer('flights_charge_amount')->default(0);
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
        Schema::dropIfExists('transaction_charges');
    }
};
