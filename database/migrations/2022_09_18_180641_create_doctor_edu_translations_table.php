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
        Schema::create('doctor_edu_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_edu_id')->constrained('doctor_edus')->onUpdate('cascade')->onDelete('cascade');
            $table->string('locale');
            $table->string('title');
            $table->unique(['doctor_edu_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_edu_translations');
    }
};
