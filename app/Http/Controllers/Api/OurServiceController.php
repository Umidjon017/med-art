<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\OurService\OurService;
use App\Http\Resources\Admin\OurService\OurServiceResource;

class OurServiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $services = OurService::all();

        return OurServiceResource::collection($services);
    }
}
