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
        Schema::create('aboutus_content_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aboutus_content_id')->constrained('aboutus_contents')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('description');
            $table->unique(['aboutus_content_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutus_content_translations');
    }
};
