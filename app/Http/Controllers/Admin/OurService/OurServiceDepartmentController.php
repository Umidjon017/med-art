<?php

namespace App\Http\Controllers\Admin\OurService;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurService\OurServiceDepartment;
use App\Http\Requests\Admin\OurService\StoreOurServiceDepartmentRequest;
use App\Http\Requests\Admin\OurService\UpdateOurServiceDepartmentRequest;

class OurServiceDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOurServiceDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOurServiceDepartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(OurServiceDepartment $ourServiceDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(OurServiceDepartment $ourServiceDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOurServiceDepartmentRequest  $request
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOurServiceDepartmentRequest $request, OurServiceDepartment $ourServiceDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurServiceDepartment $ourServiceDepartment)
    {
        //
    }
}
