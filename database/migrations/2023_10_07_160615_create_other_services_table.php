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
        Schema::create('other_services', function (Blueprint $table) {
            $table->id();
            $table->string('funds')->nullable();
            $table->integer('amount')->nullable();
            $table->string('beneficiary')->nullable();
            $table->string('holder')->nullable();
            $table->string('account_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('route_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->integer('total_amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('other_services');
    }
};
