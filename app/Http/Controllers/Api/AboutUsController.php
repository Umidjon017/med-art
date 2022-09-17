<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\About\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\About\AboutUsResource;

use function PHPUnit\Framework\returnCallback;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = AboutUs::all();
        
        return AboutUsResource::collection($aboutus);
    }
}
