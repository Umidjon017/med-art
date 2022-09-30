<?php

namespace App\Models\Admin\OurService;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class OurServiceDepartment extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'our_service_departments';
    protected $translationForeignKey = 'service_id';

    public $translatedAttributes = [
        'name',
        'description',
    ];

    protected $fillable = [
        'slug',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    const IMAGE_PATH = 'admin/images/our-service/departments/';

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
        // http://localhost:8000/admin/images/our-service/departments/ == 59
        $expl = substr($this->image, 59);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
