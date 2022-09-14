<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_image',
    ];

    public function aboutusContents(): HasMany
    {
        return $this->hasMany(AboutusContent::class);
    }
}
