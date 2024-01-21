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
        Schema::create('international_flights', function (Blueprint $table) {
            $table->id();
            $table->string('airport_location_from')->nullable();
            $table->string('airport_location_to')->nullable();
            $table->date('flight_date')->nullable();
            $table->date('flight_return_date')->nullable();
            $table->string('flight_class')->nullable();
            $table->string('round_trip')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('number_passenger')->nullable();
            $table->string('passenger_name')->nullable();
            $table->string('baggage_weight')->nullable();
            $table->string('passenger_title')->nullable();
            $table->string('passenger_fname_onpassport')->nullable();
            $table->string('passenger_lastname_onpassport')->nullable();
            $table->string('passenger_gender_onpassport')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('passenger_email')->nullable();
            $table->string('passenger_phone')->nullable();
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
        Schema::dropIfExists('international_flights');
    }
};
