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
        Schema::create('news_info_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_info_id')->constrained('news_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('full_description');
            $table->longText('description_1')->nullable();
            $table->longText('description_2')->nullable();
            $table->unique(['news_info_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_info_translations');
    }
};
