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
        Schema::create('aboutus_faq_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aboutus_faq_id')->constrained('aboutus_faqs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('question');
            $table->text('answer');
            $table->unique(['aboutus_faq_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutus_faq_translations');
    }
};
