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
        Schema::create('our_service_faq_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_faq_id')->constrained('our_service_faqs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale');
            $table->string('question');
            $table->text('answer');
            $table->unique(['service_faq_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_service_faq_translations');
    }
};
