<?php

namespace App\Models\Admin\Contuct;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContuctUs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'phone_number',
    ];

    protected $dates = ['deleted_at'];
}
