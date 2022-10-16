<?php

namespace App\Http\Controllers\Api\ContuctUs;

use App\Models\Admin\Contuct\ContuctUs;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Contuct\StoreContuctUsRequest;
use App\Models\Admin\Appointment\Appointment;

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
        $data = $request->all();
        $user = ContuctUs::create($data);

        return $this->sendResponse($user, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
