<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorInfoTranslation extends Model
{
    use HasFactory;

    protected $table = 'doctor_info_translations';

    protected $fillable = [
        'full_name',
        'biography',
        'specification',
        'description',
    ];

    public $timestamps = false;
}
