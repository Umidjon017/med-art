<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Http\Resources\Admin\Doctors\DoctorsResource;
use App\Models\Admin\Doctor\Doctor;

class DoctorsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $doctors = Doctor::all();
        
        return DoctorsResource::collection($doctors);
    }
}
