<?php

namespace App\Http\Controllers\Api\Operations;

use Illuminate\Http\Request;
use App\Models\Admin\Operation\Operation;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\Admin\Operations\OperationResource;

class OperationController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $operations = OperationResource::collection(Operation::all());

        return $this->sendResponse($operations, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
