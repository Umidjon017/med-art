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
        $faqs = DoctorFaq::all();
        return view('admin.doctors.faqs.index', compact('faqs'));
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
        $data = $request->all();
        $aboutUsFaqs = DoctorFaq::create($data);

        return redirect()->route('admin.doctors.faqs.index')->withSuccess("Ma'lumot qo'shildi!");
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
    public function edit($id)
    {
        $faq = DoctorFaq::findOrFail($id);

        return view('admin.doctors.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorFaqRequest  $request
     * @param  \App\Models\Admin\Doctor\DoctorFaq  $doctorFaq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorFaqRequest $request, $id)
    {
        $model = DoctorFaq::findOrFail($id);
        $data = $request->all();
        $model->update($data);

        return redirect()->route('admin.doctors.faqs.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\DoctorFaq  $doctorFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = DoctorFaq::findOrFail($id);
        $model->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
