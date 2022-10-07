<?php

namespace App\Http\Controllers\Api\Operations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Operations\OperationResource;
use App\Models\Admin\Operation\Operation;
use Illuminate\Http\Request;

class SingleOperationController extends Controller
{
    public function __invoke($id)
    {
        $filter = Operation::where('id', $id)->get();

        return OperationResource::collection($filter);
    }
}
