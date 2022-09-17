<?php

namespace App\Models\Admin\About;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutusFaqTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
    ];

    public $timestamps = false;
}
