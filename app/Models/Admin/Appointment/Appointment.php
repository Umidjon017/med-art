<?php

namespace App\Models\Admin\Appointment;

use App\Models\Admin\Doctor\DoctorInfo;
use App\Models\Admin\OurService\OurServiceDepartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'our_service_department_id',
        'doctor_info_id',
        'full_name',
        'email',
        'phone_number',
        'date',
    ];

    protected $dates = ['deleted_at'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(OurServiceDepartment::class, 'our_service_department_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(DoctorInfo::class, 'doctor_info_id');
    }
}
