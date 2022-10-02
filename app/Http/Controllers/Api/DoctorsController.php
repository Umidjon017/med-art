<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Doctor\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Doctors\DoctorsResource;

class DoctorsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $doctors = DoctorsResource::collection(Doctor::all());
        
        return $this->sendResponse($doctors, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
