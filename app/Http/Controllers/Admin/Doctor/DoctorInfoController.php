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
        $items = DoctorInfo::all();

        return view('admin.doctors.doctor-infos.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.doctor-infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Doctor\StoreDoctorInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorInfoRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/doctors/doctor-infos/');
            DoctorInfo::isPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/doctors/doctor-infos/".$image_name;
            $data['image'] = $url;
        }
        $doctors = DoctorInfo::create($data);

        return redirect()->route('admin.doctors.doctor-infos.index')->withSuccess("Ma'lumot qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DoctorInfo::findOrFail($id);

        return view('admin.doctors.doctor-infos.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = DoctorInfo::findOrFail($id);

        return view('admin.doctors.doctor-infos.edit', compact('doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Doctor\UpdateDoctorInfoRequest  $request
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorInfoRequest $request, $id)
    {
        $model = DoctorInfo::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/doctors/doctor-infos/');
        if($request->file('image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('image');
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/doctors/doctor-infos/".$image_name;
            $data['image'] = $url;
        }
        $model->update($data);

        return redirect()->route('admin.doctors.doctor-infos.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = DoctorInfo::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
