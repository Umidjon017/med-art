<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorFaqTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
    ];

    public $timestamps = false;
}
