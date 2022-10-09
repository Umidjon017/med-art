<?php

namespace App\Http\Controllers\Api\Operations;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Operations\OperationResource;
use App\Models\Admin\Operation\Operation;

class LimitOperationsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $limit = OperationResource::collection(Operation::limit($id)->get());

        return $this->sendResponse($limit, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");;
    }
}
