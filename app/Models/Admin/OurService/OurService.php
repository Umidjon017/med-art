<?php

namespace App\Models\Admin\OurService;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class OurService extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'our_services';

    public $translatedAttributes = [
        'title',
        'description',
    ];

    protected $fillable = [
        'header_image',
    ];

    const IMAGE_PATH = 'admin/images/our-service/home-image/';

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
        // http://localhost:8000/admin/images/our-service/home-image/ == 58
        $expl = substr($this->header_image, 58);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
