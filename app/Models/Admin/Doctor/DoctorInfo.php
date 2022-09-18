<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class DoctorInfo extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'full_name',
        'biography',
        'specification',
        'edu_bachelor',
        'edu_master',
        'edu_phd',
        'edu_asperanture',
        'edu_addition',
    ];

    protected $fillable = [
        'image',
        'award_1',
        'award_2',
        'award_3',
        'award_4',
        'award_5',
        'link_linkedin',
        'link_facebook',
        'link_instagram',
    ];

    const IMAGE_PATH = 'admin/images/doctors/doctor-infos/';

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
        // http://localhost:8000/admin/images/doctors/doctor-infos/ == 56
        $expl = substr($this->header_image, 56);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
