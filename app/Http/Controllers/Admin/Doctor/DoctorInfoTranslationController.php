<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfoTranslation;
use App\Http\Requests\Admin\Doctor\StoreDoctorInfoTranslationRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorInfoTranslationRequest;

class DoctorInfoTranslationController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorInfoTranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorInfoTranslationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfoTranslation  $doctorInfoTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorInfoTranslation $doctorInfoTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfoTranslation  $doctorInfoTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorInfoTranslation $doctorInfoTranslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorInfoTranslationRequest  $request
     * @param  \App\Models\Admin\Doctor\DoctorInfoTranslation  $doctorInfoTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorInfoTranslationRequest $request, DoctorInfoTranslation $doctorInfoTranslation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfoTranslation  $doctorInfoTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorInfoTranslation $doctorInfoTranslation)
    {
        //
    }
}
