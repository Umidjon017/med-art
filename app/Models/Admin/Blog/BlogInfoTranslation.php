<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogInfoTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_1',
        'title_2',
        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'addition_select',
        'theme',
    ];

    public $timestamps = false;
}
