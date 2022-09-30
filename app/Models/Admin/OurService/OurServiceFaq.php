<?php

namespace App\Models\Admin\OurService;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class OurServiceFaq extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'our_service_faqs';
    protected $translationForeignKey = 'service_faq_id';

    public $translatedAttributes = [
        'question',
        'answer',
    ];

    protected $fillable = [
        'id',
    ];
}
