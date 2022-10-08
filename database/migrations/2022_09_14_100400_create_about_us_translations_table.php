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
        Schema::create('about_us_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_us_id')->constrained('about_us')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('header_title');
            $table->longText('header_description');
            $table->unique(['about_us_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_translations');
    }
};
