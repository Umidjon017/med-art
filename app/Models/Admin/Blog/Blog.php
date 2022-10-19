<?php

namespace App\Models\Admin\Blog;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Blog extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'header_title',
        'header_description',
    ];

    protected $fillable = [
        'header_image',
    ];

    const IMAGE_PATH = 'admin/images/blogs/home-image/';

    public static function isPhotoDirectoryExists(): bool
    {
        if (!File::exists(self::IMAGE_PATH))
        {
            File::makeDirectory(self::IMAGE_PATH, 0777, true);
        }
        return true;
    }

    public static function randomImageName()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = uniqid() . mt_rand(1000000, 9999999) . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        return $string;
    }

    public static function imageUrl()
    {
        $url = url(self::IMAGE_PATH) . '/';

        return $url;
    }

    public function deleteImage(): bool
    {
        // http://localhost:8000/admin/images/blogs/home-image/ == 52
        $expl = substr($this->header_image, 52);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
