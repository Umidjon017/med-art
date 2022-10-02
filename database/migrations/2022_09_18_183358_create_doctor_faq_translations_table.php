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
        Schema::create('doctor_faq_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_faq_id')->constrained('doctor_faqs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('question');
            $table->longText('answer');
            $table->unique(['doctor_faq_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_faq_translations');
    }
};
