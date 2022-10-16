<?php

namespace App\Models\Admin\Blog;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class BlogInfo extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'title_1',
        'title_2',
        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'addition_select',
        'theme',
    ];

    protected $fillable = [
        'image',
        'link_video',
    ];

    const IMAGE_PATH = 'admin/images/blogs/blog-infos/';

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
        // http://localhost:8000/admin/images/blogs/blog-infos/ == 52
        $expl = substr($this->image, 52);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
}
