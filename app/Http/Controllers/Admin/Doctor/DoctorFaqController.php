<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorFaq;
use App\Http\Requests\Admin\Doctor\StoreDoctorFaqRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorFaqRequest;

class DoctorFaqController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorFaqRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorFaq  $doctorFaq
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorFaq $doctorFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorFaq  $doctorFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorFaq $doctorFaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorFaqRequest  $request
     * @param  \App\Models\Admin\Doctor\DoctorFaq  $doctorFaq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorFaqRequest $request, DoctorFaq $doctorFaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\DoctorFaq  $doctorFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorFaq $doctorFaq)
    {
        //
    }
}
