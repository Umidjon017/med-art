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
        Schema::create('doctor_award', function (Blueprint $table) {
            $table->id();
            $table->foreignId('award_doctor_id')->constrained('award_doctors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('doctor_award');
    }
};
