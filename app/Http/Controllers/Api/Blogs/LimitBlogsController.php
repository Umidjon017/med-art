<?php

namespace App\Http\Controllers\Api\Blogs;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Blogs\BlogInfosResource;
use App\Models\Admin\Blog\BlogInfo;

class LimitBlogsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $limit = BlogInfosResource::collection(BlogInfo::limit($id)->get());

        return $this->sendResponse($limit, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");;
    }
}
