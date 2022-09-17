<?php

namespace App\Models\Admin\OurService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurServiceFaqTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
    ];

    public $timestamps = false;
}
