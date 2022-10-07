<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Controller;
use App\Models\Admin\News\NewsInfos;
use App\Http\Resources\Admin\News\NewsInfosResource;

class SingleNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $filter = NewsInfos::where('id', $id)->get();

        return NewsInfosResource::collection($filter);
    }
}
