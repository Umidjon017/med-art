<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Models\Admin\Doctor\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Doctor\StoreDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Doctor::all();

        return view('admin.doctors.home-image.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('header_image'))
        {
            $files = $request->header_image;
            $destination = public_path('admin/images/doctors/home-image/');
            Doctor::isPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/doctors/home-image/".$image_name;
            $data['header_image'] = $url;
        }
        $aboutus = Doctor::create($data);

        return redirect()->route('admin.doctors.home-image.index')->withSuccess("Uy rasmi qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Doctor::findOrFail($id);

        return view('admin.doctors.home-image.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Admin\Doctor\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, $id)
    {
        $model = Doctor::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/doctors/home-image/');
        if($request->file('header_image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('header_image');
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/doctors/home-image/".$image_name;
            $data['header_image'] = $url;
        }
        $model->update($data);
        
        return redirect()->route('admin.doctors.home-image.index')->withSuccess('Uy rasmi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Doctor::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Uy rasmi o'chirildi!");
    }
}
