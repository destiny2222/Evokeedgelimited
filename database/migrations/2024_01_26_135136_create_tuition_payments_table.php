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
            $table->string('student_email')->nullable();
            $table->integer('amount')->nullable()->default(0);
            $table->string('college_name')->nullable();
            $table->string('portal_password')->nullable();
            $table->string('student_id')->nullable();
            $table->string('service_type')->nullable();
            $table->longText('portal_link')->nullable();
            $table->string('legal_name')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tuition_payments');
    }
};
