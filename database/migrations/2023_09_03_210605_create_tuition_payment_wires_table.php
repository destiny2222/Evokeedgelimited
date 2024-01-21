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
        Schema::create('tuition_payment_wires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('student_email');
            $table->string('service_type');
            $table->string('college_name');
            $table->string('legal_name');
            $table->string('account_number');
            $table->string('routing_number');
            $table->string('school_iban')->nullable();
            $table->string('bank_swift_code');
            $table->string('student_id');
            $table->longText('school_address');
            $table->boolean('paid')->default(false);
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
        Schema::dropIfExists('tuition_payment_wires');
    }
};
