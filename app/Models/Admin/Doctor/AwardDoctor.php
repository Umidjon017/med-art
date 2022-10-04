<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AwardDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    const IMAGE_PATH = 'admin/images/doctors/awards/';

    public static function isPhotoDirectoryExists(): bool
    {
        if (!File::exists(self::IMAGE_PATH))
        {
            File::makeDirectory(self::IMAGE_PATH, 0777, true);
        }
        return true;
    }

    public function deleteImage(): bool
    {
        // http://localhost:8000/admin/images/doctors/awards/ == 50
        $expl = substr($this->image, 50);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(DoctorInfo::class, 'doctor_award', 'award_doctor_id');
    }
}
