<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Http\Requests\Admin\Doctor\StoreDoctorInfoRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorInfoRequest;

class DoctorInfoController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorInfo $doctorInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorInfo $doctorInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorInfoRequest  $request
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorInfoRequest $request, DoctorInfo $doctorInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorInfo $doctorInfo)
    {
        //
    }
}
