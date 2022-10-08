<?php

namespace App\Http\Controllers\Admin\OurService;

use Illuminate\Support\Str;
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
        return view('admin.our-srevice.departments.create');
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
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/our-service/departments/".$image_name;
            $data['image'] = $url;
        }
        
        if($request->hasFile('icon'))
        {
            $files = $request->icon;
            $destination = public_path('admin/images/our-service/departments/');
            OurServiceDepartment::isPhotoDirectoryExists();
            $image_name = time().'_'.'icon'.'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/our-service/departments/".$image_name;
            $data['icon'] = $url;
        }
        $news = OurServiceDepartment::create($data);

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
        
        return view('admin.our-srevice.departments.show', compact('items'));
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

        return view('admin.our-srevice.departments.edit', compact('items'));
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
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/our-service/departments/".$image_name;
            $data['image'] = $url;
        }
        if($request->file('icon') !== null)
        {
            $model->deleteIcon();
            $files = $request->file('icon');
            $image_name = time().'_'.'icon'.'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/our-service/departments/".$image_name;
            $data['icon'] = $url;
        }
        $model->update($data);

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
