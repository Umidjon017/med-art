<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Models\Admin\Doctor\DoctorInfo;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Doctors\DoctorInfosResource;

class LimitDoctorsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $limit = DoctorInfosResource::collection(DoctorInfo::limit($id)->get());

        return $this->sendResponse($limit, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
