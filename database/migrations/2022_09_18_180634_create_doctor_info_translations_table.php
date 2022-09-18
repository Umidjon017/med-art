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
        Schema::create('doctor_info_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctor_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('full_name');
            $table->text('biography');
            $table->string('specification');
            $table->string('edu_bachelor')->nullable();
            $table->string('edu_master')->nullable();
            $table->string('edu_phd')->nullable();
            $table->string('edu_asperanture')->nullable();
            $table->string('edu_addition')->nullable();
            $table->unique(['doctor_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_info_translations');
    }
};
