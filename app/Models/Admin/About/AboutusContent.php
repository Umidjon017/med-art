<?php

namespace App\Models\Admin\About;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class AboutusContent extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'title_1',
        'description_1',
        'title_2',
        'description_2',
    ];

    protected $fillable = [
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    const IMAGE_PATH = 'admin/images/about-us/contents/';

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
        // http://localhost:8000/admin/images/about-us/contents/ == 53
        $expl = substr($this->image, 53);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
