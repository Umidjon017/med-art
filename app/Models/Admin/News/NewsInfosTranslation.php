<?php

namespace App\Models\Admin\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsInfosTranslation extends Model
{
    use HasFactory;

    protected $table = 'news_info_translations';

    protected $fillable = [
        'title',
        'full_description',
        'description_1',
        'description_2',
    ];

    public $timestamps = false;
}
