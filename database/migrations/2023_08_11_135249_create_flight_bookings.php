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
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('airport_location_from')->nullable();
            $table->string('airport_location_to')->nullable();
            $table->date('flight_date')->nullable();
            $table->time('flight_time')->nullable();
            $table->date('flight_return_date')->nullable();
            $table->string('flight_passenger_number')->nullable();
            $table->string('flight_class')->nullable();
            $table->string('passenger_name')->nullable();
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
        Schema::dropIfExists('flight_bookings');
    }
};
