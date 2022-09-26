<?php

namespace App\Models\Admin\Operation;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'operation_id',
        'detail_image',
    ];
    
    public function operation(): BelongsTo
    {
        return $this->belongsTo(Operation::class, 'operation_id');
    }
}
