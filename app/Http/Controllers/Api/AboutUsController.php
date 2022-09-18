<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\About\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\About\AboutUsResource;

class AboutUsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $aboutus = AboutUs::all();
        
        return AboutUsResource::collection($aboutus);
    }
}