<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AboutusContent extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = [
        'title',
        'description',
    ];

    protected $fillable = [
        'aboutus_id',
        'image',
    ];

    public function aboutUs(): BelongsTo
    {
        return $this->belongsTo(AboutUs::class, 'aboutus_id');
    }
}
