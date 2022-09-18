<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorInfoTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'biography',
        'specification',
        'edu_bachelor',
        'edu_master',
        'edu_phd',
        'edu_asperanture',
        'edu_addition',
    ];

    public $timestamps = false;
}
