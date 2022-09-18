<?php

namespace App\Models\Admin\Operation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperationTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'detail_description',
        'full_description',
    ];

    public $timestamps = false;
}
