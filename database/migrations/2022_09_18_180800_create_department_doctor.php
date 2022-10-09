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
        Schema::create('department_doctor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_service_department_id')->constrained('our_service_departments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('doctor_info_id')->constrained('doctor_infos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_doctor');
    }
};
