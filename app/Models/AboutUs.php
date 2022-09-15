<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'header_image',
    ];

    public function aboutusContents(): HasMany
    {
        return $this->hasMany(AboutusContent::class);
    }

    const IMAGE_PATH = 'admin/images/about-us/';
    public function deleteImage(): bool
    {
        // http://localhost:8000/admin/images/about-us/ == 44
        $expl = substr($this->header_image, 44);
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }

        return true;
    }
}
