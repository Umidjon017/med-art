<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogInfoTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'theme',
    ];

    public $timestamps = false;
}
