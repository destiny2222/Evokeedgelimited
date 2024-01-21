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
        Schema::create('tuition_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('student_email');
            $table->integer('amount');
            $table->string('college_name');
            $table->string('portal_password');
            $table->string('student_id');
            $table->string('service_type');
            $table->longText('portal_link');
            $table->string('legal_name');
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
        Schema::dropIfExists('tuition_payments');
    }
};
