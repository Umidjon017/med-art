<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class DoctorEdu extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'title',
    ];

    protected $fillable = [
        'id',
        'doctor_info_id',
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(DoctorInfo::class, 'doctor_info_id');
    }
}
