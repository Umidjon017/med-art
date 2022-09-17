<?php

namespace App\Models\Admin\OurService;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurService extends Model
{
    use HasFactory;

    protected $table = 'our_services';

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
