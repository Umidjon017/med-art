<?php

namespace App\Http\Controllers\Api\Blogs;

use Illuminate\Http\Request;
use App\Models\Admin\Blog\Blog;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Blogs\BlogsResource;

class BlogsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $doctors = BlogsResource::collection(Blog::all());
        
        return $this->sendResponse($doctors, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
