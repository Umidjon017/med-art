<?php

namespace App\Models\Admin\OurService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServiceTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'header_title',
        'header_description',
    ];

    public $timestamps = false;
}
