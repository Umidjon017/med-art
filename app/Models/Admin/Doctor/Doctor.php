<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Doctor extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'doctors';

    public $translatedAttributes = [
        'header_title',
        'header_description',
    ];

    protected $fillable = [
        'header_image',
    ];

    const IMAGE_PATH = 'admin/images/doctors/home-image/';

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
        // http://localhost:8000/admin/images/doctors/home-image/ == 54
        $expl = substr($this->header_image, 54);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
