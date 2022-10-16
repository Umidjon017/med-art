<?php

namespace App\Http\Controllers\Api\ContuctUs;

use App\Models\Admin\Contuct\ContuctUs;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Contuct\StoreContuctUsRequest;

class ContuctUsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreContuctUsRequest $request)
    {
        $user = ContuctUs::create([
            'full_name'     => $request->full_name,
            'phone_number'  => $request->phone_number,
        ]);

        return $this->sendResponse($user, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
