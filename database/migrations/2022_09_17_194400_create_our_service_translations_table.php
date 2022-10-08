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
        Schema::create('our_service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_service_id')->constrained('our_services')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('description');
            $table->unique(['our_service_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_service_translations');
    }
};
