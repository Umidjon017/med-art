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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_service_department_id')->constrained('our_service_departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('doctor_info_id')->constrained('doctor_infos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->string('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
