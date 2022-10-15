<?php

namespace App\Http\Controllers\Api\Sponsors;

use Illuminate\Http\Request;
use App\Models\Admin\Sponsor\Sponsor;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Sponsors\SponsorsResource;

class SponsorController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $sponsors = SponsorsResource::collection(Sponsor::all());
        
        return $this->sendResponse($sponsors, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
