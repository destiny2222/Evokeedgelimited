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
        Schema::create('visa_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('total_charge')->nullable();
            $table->string('case_number')->nullable();
            $table->integer('visa_fee_amount')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('visa_website_link')->nullable();
            $table->string('user_password')->nullable();
            $table->string('username')->nullable();
            $table->set('visa_type', ['usa', 'canada', 'uk'])->nullable();
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
        Schema::dropIfExists('visa_applications');
    }
};
