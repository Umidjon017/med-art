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
        Schema::create('our_service_department_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('our_service_departments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('name');
            $table->longText('description');
            $table->longText('full_description')->nullable();
            $table->unique(['service_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_service_department_translations');
    }
};
