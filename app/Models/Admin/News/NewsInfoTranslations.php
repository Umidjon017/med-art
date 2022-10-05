<?php

namespace App\Models\Admin\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsInfoTranslations extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_description',
    ];

    public $timestamps = false;
}
