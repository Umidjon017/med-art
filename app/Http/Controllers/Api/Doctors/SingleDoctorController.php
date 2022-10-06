<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Http\Resources\Admin\Doctors\DoctorInfosResource;

class SingleDoctorController extends Controller
{
    public function __invoke($id)
    {
        $filter = DoctorInfo::where('id', $id)->get();
        
        return DoctorInfosResource::collection($filter);
    }
}
