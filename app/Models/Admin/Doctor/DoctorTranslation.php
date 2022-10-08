<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'header_title',
        'header_description',
    ];

    public $timestamps = false;
}
