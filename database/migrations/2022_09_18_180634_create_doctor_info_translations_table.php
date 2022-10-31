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
            $table->foreignId('doctor_info_id')->nullable()->constrained('doctor_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('full_name');
            $table->longText('biography');
            $table->string('specification');
            $table->longText('description')->nullable();
            $table->unique(['doctor_info_id', 'locale']);
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
