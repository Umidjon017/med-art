<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\News\NewsInfosResource;
use App\Models\Admin\News\NewsInfos;
use Illuminate\Http\Request;

class LimitNewsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $limit = NewsInfosResource::collection(NewsInfos::limit($id)->get());

        return $this->sendResponse($limit, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");;
    }
}
