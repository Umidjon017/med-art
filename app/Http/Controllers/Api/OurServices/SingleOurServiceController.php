<?php

namespace App\Http\Controllers\Api\OurServices;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurService\OurServiceDepartment;
use App\Http\Resources\Admin\OurService\OurServiceDepartmentsResourse;

class SingleOurServiceController extends Controller
{
    public function __invoke($id)
    {
        $filter = OurServiceDepartment::where('id', $id)->get();

        return OurServiceDepartmentsResourse::collection($filter);
    }
}
