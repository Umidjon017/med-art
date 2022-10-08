<?php

namespace App\Models\Admin\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'header_title',
        'header_description',
    ];

    public $timestamps = false;
}
