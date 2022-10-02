<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\AwardDoctor;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Doctors\AwardDoctorsResource;

class AwardDoctorController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $awards = AwardDoctorsResource::collection(AwardDoctor::all());

        return $this->sendResponse($awards, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
