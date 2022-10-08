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
        Schema::create('operation_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operation_id')->constrained('operations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('header_title');
            $table->longText('header_description');
            $table->string('title');
            $table->longText('detail_description');
            $table->longText('full_description');
            $table->unique(['operation_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_translations');
    }
};
