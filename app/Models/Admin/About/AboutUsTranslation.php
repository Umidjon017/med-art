<?php

namespace App\Models\Admin\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
    ];

    public $timestamps = false;
}
