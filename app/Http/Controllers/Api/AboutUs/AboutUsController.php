<?php

namespace App\Http\Controllers\Api\AboutUs;

use Illuminate\Http\Request;
use App\Models\Admin\About\AboutUs;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\About\AboutUsResource;

class AboutUsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $aboutus = AboutUsResource::collection(AboutUs::all());
        
        return $this->sendResponse($aboutus, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
