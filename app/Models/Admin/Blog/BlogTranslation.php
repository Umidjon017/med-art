<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'header_title',
        'header_description',
    ];

    public $timestamps = false;
}
