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
            $table->string('student_email')->nullable();
            $table->string('service_type')->nullable();
            $table->string('college_name')->nullable();
            $table->string('legal_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('bank_swift_code')->nullable();
            $table->string('school_iban')->nullable();
            $table->string('student_id')->nullable();
            $table->longText('school_address')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('amount')->default(0);
            $table->boolean('paid')->default(false);
            $table->set('done', ['pending','processing', 'completed'])->default('pending');
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
