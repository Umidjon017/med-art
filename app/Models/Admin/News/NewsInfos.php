<?php

namespace App\Models\Admin\News;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class NewsInfos extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'news_infos';
    protected $translationForeignKey = 'news_info_id';

    public $translatedAttributes = [
        'title',
        'full_description',
        'description_1',
        'description_2',
    ];

    protected $fillable = [
        'image',
        'popularity',
    ];

    const IMAGE_PATH = 'admin/images/news/news-infos/';

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
        // http://localhost:8000/admin/images/news/news-infos/ == 51
        $expl = substr($this->image, strlen(self::imageUrl()));
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
