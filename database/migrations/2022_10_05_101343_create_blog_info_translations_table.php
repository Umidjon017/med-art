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
        Schema::create('blog_info_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_info_id')->constrained('blog_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('title_1');
            $table->string('title_2')->nullable();
            $table->longText('description_1');
            $table->longText('description_2')->nullable();
            $table->longText('description_3')->nullable();
            $table->longText('description_4')->nullable();
            $table->string('addition_select')->nullable();
            $table->string('theme')->nullable();
            $table->unique(['blog_info_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_info_translations');
    }
};
