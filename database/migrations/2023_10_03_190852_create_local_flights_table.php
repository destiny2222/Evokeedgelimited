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
        Schema::create('local_flights', function (Blueprint $table) {
            $table->id();
            $table->string('airport_location_from')->nullable();
            $table->string('airport_location_to')->nullable();
            $table->date('flight_date')->nullable();
            $table->string('flight_class')->nullable();
            $table->string('adult')->nullable();
            $table->string('child')->nullable();
            $table->string('infant')->nullable();
            $table->string('gender')->nullable();
            $table->string('title')->nullable();
            $table->date('date_birth_date')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('on_way')->nullable();
            $table->string('round_trip')->nullable();
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
        Schema::dropIfExists('local_flights');
    }
};
