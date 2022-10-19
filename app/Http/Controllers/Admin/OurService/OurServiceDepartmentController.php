<?php

namespace App\Http\Controllers\Admin\OurService;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Admin\OurService\OurServiceDepartment;
use App\Http\Requests\Admin\OurService\StoreOurServiceDepartmentRequest;
use App\Http\Requests\Admin\OurService\UpdateOurServiceDepartmentRequest;
use App\Models\Admin\Doctor\DoctorInfo;

class OurServiceDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OurServiceDepartment::all();

        return view('admin.our-srevice.departments.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = DoctorInfo::all();

        return view('admin.our-srevice.departments.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOurServiceDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOurServiceDepartmentRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/our-service/departments/');
            OurServiceDepartment::isPhotoDirectoryExists();
            $image_name = time().'_'.OurServiceDepartment::randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);
            $url = OurServiceDepartment::imageUrl().$image_name;
            $data['image'] = $url;
        }
        
        if($request->hasFile('icon'))
        {
            $files = $request->icon;
            $destination = public_path('admin/images/our-service/departments/');
            OurServiceDepartment::isPhotoDirectoryExists();
            $image_name = time().'_'.OurServiceDepartment::randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);
            $url = OurServiceDepartment::imageUrl().$image_name;
            $data['icon'] = $url;
        }
        $departments = OurServiceDepartment::create($data);

        $doctors = $request->doctor_info_id;
        if ($doctors != '') {
            foreach ($doctors as $doctor) {
                $departments->doctors()->attach($doctor);
            }
        }

        return redirect()->route('admin.our-service.departments.index')->withSuccess("Ma'lumot qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = OurServiceDepartment::findOrFail($id);
        $doctors = $items->doctors()->get();
        
        return view('admin.our-srevice.departments.show', compact('items', 'doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = OurServiceDepartment::findOrFail($id);
        $doctors = DoctorInfo::all();
        $department_doctors = $items->doctors()->get();

        return view('admin.our-srevice.departments.edit', compact('items', 'doctors', 'department_doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOurServiceDepartmentRequest  $request
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOurServiceDepartmentRequest $request, $id)
    {
        $model = OurServiceDepartment::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/our-service/departments/');
        if($request->file('image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('image');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);            
            $url = $model->imageUrl().$image_name;
            $data['image'] = $url;
        }
        if($request->file('icon') !== null)
        {
            $model->deleteIcon();
            $files = $request->file('icon');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);
            $url = $model->imageUrl().$image_name;
            $data['icon'] = $url;
        }
        $model->update($data);
        
        $model->doctors()->sync($request->doctor_info_id);

        return redirect()->route('admin.our-service.departments.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\OurService\OurServiceDepartment  $ourServiceDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = OurServiceDepartment::findOrFail($id);
        $model->delete();
        $model->deleteImage();
        $model->deleteIcon();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
