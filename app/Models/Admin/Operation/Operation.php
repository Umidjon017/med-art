<?php

namespace App\Models\Admin\Operation;

use App\Models\Admin\Doctor\DoctorInfo;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Operation extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'header_title',
        'header_description',
        'title',
        'detail_description',
        'full_description',
    ];

    protected $fillable = [
        'header_image',
        'date',
        'link_video',
    ];

    const IMAGE_HEADER_PATH = 'admin/images/operations/home-image/';
    const IMAGE_DETAIL_PATH = 'admin/images/operations/details/';

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

    public static function imageHeaderUrl()
    {
        $url = url(self::IMAGE_HEADER_PATH) . '/';

        return $url;
    }

    public static function imageDetailUrl()
    {
        $url = url(self::IMAGE_DETAIL_PATH) . '/';

        return $url;
    }

    public static function isHeaderPhotoDirectoryExists(): bool
    {
        if (!File::exists(self::IMAGE_HEADER_PATH))
        {
            File::makeDirectory(self::IMAGE_HEADER_PATH, 0777, true);
        }
        return true;
    }

    public function deleteHeaderImage(): bool
    {
        // http://localhost:8000/admin/images/operations/home-image/ == 57
        $expl = substr($this->header_image, strlen(self::imageHeaderUrl()));
        if (File::exists(self::IMAGE_HEADER_PATH.$expl))
        {
            File::delete(self::IMAGE_HEADER_PATH.$expl);
        }
        return true;
    }
    
    public static function isDetailPhotoDirectoryExists(): bool
    {
        if (!File::exists(self::IMAGE_DETAIL_PATH))
        {
            File::makeDirectory(self::IMAGE_DETAIL_PATH, 0777, true);
        }
        return true;
    }
    
    public function deleteDetailImage(): bool
    {
        foreach ($this->images as $image)
        {
            // http://localhost:8000/admin/images/operations/details/ == 54
            $expl = substr($image->detail_image, strlen(self::imageDetailUrl()));
            if (File::exists(self::IMAGE_DETAIL_PATH.$expl))
            {
                File::delete(self::IMAGE_DETAIL_PATH.$expl);
            }
            $image->delete();
        }
        return true;
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(DoctorInfo::class, 'doctor_operation', 'operation_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(OperationImage::class, 'operation_id');
    }
}
