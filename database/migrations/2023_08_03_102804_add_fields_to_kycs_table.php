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
        Schema::table('kycs', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender')->nullable();
            $table->string('approve_status')->default(0);
            $table->string('marital_status')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->longText('permenant_address')->nullable();
            $table->longText('street_address')->nullable();
            $table->longText('street_address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('status')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('proof_of_address')->nullable();
            $table->string('documents')->nullable();
            $table->string('decleration_firstname')->nullable();
            $table->string('decleration_lastname')->nullable();
            $table->string('signature')->nullable();
            $table->date('data_sign')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kycs', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender')->nullable();
            $table->string('approve_status')->default(0);
            $table->string('marital_status')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->longText('permenant_address')->nullable();
            $table->longText('street_address')->nullable();
            $table->longText('street_address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('status')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('proof_of_address')->nullable();
            $table->string('documents')->nullable();
            $table->string('decleration_firstname')->nullable();
            $table->string('decleration_lastname')->nullable();
            $table->string('signature')->nullable();
            $table->date('data_sign')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }
};
