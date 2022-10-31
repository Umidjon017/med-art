<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorEdu;
use App\Http\Requests\StoreDoctorEduRequest;
use App\Http\Requests\UpdateDoctorEduRequest;

class DoctorEduController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorEduRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorEduRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorEdu  $doctorEdu
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorEdu $doctorEdu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorEdu  $doctorEdu
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorEdu $doctorEdu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorEduRequest  $request
     * @param  \App\Models\Admin\Doctor\DoctorEdu  $doctorEdu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorEduRequest $request, DoctorEdu $doctorEdu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\DoctorEdu  $doctorEdu
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorEdu $doctorEdu)
    {
        //
    }
}
