<?php

namespace App\Http\Controllers\Api\OurServices;

use App\Http\Controllers\Api\BaseController;
use App\Models\Admin\OurService\OurServiceDepartment;
use App\Http\Resources\Admin\OurService\OurServiceResource;

class LimitOurServicesController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $limit = OurServiceResource::collection(OurServiceDepartment::limit($id)->get());

        return $this->sendResponse($limit, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
