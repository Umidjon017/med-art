<?php

namespace App\Models\Admin\About;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutusContentTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description_1',
        'description_2',
    ];

    public $timestamps = false;
}
