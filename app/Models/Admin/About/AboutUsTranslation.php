<?php

namespace App\Models\Admin\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'header_title',
        'header_description',
    ];

    public $timestamps = false;
}
