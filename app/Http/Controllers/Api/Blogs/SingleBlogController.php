<?php

namespace App\Http\Controllers\Api\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Blogs\BlogInfosResource;
use App\Models\Admin\Blog\BlogInfo;
use Illuminate\Http\Request;

class SingleBlogController extends Controller
{
    public function __invoke($id)
    {
        $filter = BlogInfo::where('id', $id)->get();

        return BlogInfosResource::collection($filter);
    }
}
