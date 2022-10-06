<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\News\News;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\News\NewsResource;

class NewsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $doctors = NewsResource::collection(News::all());
        
        return $this->sendResponse($doctors, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
