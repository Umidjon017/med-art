<?php

namespace App\Models\Admin\OurService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurServiceDepartmentTranslation extends Model
{
    use HasFactory;

    protected $table = 'our_service_department_translations';

    protected $fillable = [
        'name',
        'description',
        'full_description',
    ];

    public $timestamps = false;
}
