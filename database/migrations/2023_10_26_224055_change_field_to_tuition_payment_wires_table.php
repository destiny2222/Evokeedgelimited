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
        Schema::table('tuition_payment_wires', function (Blueprint $table) {
            $table->string('student_email')->nullable()->change();
            $table->string('service_type')->nullable()->change();
            $table->string('college_name')->nullable()->change();
            $table->string('legal_name')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('routing_number')->nullable()->change();
            $table->string('bank_swift_code')->nullable()->change();
            $table->string('student_id')->nullable()->change();
            $table->longText('school_address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuition_payment_wires', function (Blueprint $table) {
            $table->string('student_email')->nullable()->change();
            $table->string('service_type')->nullable()->change();
            $table->string('college_name')->nullable()->change();
            $table->string('legal_name')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('routing_number')->nullable()->change();
            $table->string('bank_swift_code')->nullable()->change();
            $table->string('student_id')->nullable()->change();
            $table->longText('school_address')->nullable()->change();
        });
    }
};
