<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Operation\Operation;
use App\Http\Resources\Admin\Operations\OperationResource;

class OperationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $operations = Operation::all();

        return OperationResource::collection($operations);
    }
}
