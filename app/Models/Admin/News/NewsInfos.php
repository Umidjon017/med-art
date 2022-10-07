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

    public function deleteImage(): bool
    {
        // http://localhost:8000/admin/images/news/news-infos/ == 51
        $expl = substr($this->image, 51);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
