<?php

namespace App\Http\Controllers\Api\OurServices;

use Illuminate\Http\Request;
use App\Models\Admin\OurService\OurService;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\OurService\OurServiceResource;

class OurServiceController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $services = OurServiceResource::collection(OurService::all());

        return $this->sendResponse($services, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
