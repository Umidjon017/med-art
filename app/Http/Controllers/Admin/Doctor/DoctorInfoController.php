<?php

namespace App\Http\Controllers\Admin\Doctor;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Models\Admin\Doctor\AwardDoctor;
use App\Models\Admin\Operation\Operation;
use App\Http\Requests\Admin\Doctor\StoreDoctorInfoRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorInfoRequest;
use App\Models\Admin\Doctor\DoctorEdu;
use App\Models\Admin\OurService\OurServiceDepartment;
use Illuminate\Support\Arr;

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
        $operations = Operation::all();
        $awards = AwardDoctor::all();
        $departments = OurServiceDepartment::all();

        return view('admin.doctors.doctor-infos.create', compact('operations', 'awards', 'departments'));
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
        dd($data);

        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/doctors/doctor-infos/');
            DoctorInfo::isPhotoDirectoryExists();
            $image_name = time().'_'.DoctorInfo::randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = DoctorInfo::imageUrl().$image_name;
            $data['image'] = $url;
        }
        if($request->hasFile('card_image'))
        {
            $files = $request->card_image;
            $destination = public_path('admin/images/doctors/doctor-infos/');
            DoctorInfo::isPhotoDirectoryExists();
            $image_name = time().'_'.DoctorInfo::randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = DoctorInfo::imageUrl().$image_name;
            $data['card_image'] = $url;
        }
        $doctors = DoctorInfo::create($data);

        $removes2 = Arr::only($data, ['uz', 'ru']);
        foreach ($removes2 as $pro) {
            // $filtered[] = Arr::only($pro, $tar);
            $filtered[] = Arr::except($pro, ['full_name', 'biography', 'specification']);

            foreach ($filtered as $key => $value) {
                $filtered2[] = $value;
            }
        }
        $doctors->edus()->create($filtered2);
        
        $departments = $request->our_service_department_id;
        if ($departments != '') {
            foreach ($departments as $department) {
                $doctors->departments()->attach($department);
            }
        }

        $operations = $request->operation_id;
        if ($operations != '') {
            foreach ($operations as $operation) {
                $doctors->operations()->attach($operation);
            }
        }
        
        $awards = $request->award_doctor_id;
        if ($awards != '') {
            foreach ($awards as $award) {
                $doctors->awards()->attach($award);
            }
        }

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
        $departments = $item->departments()->get();
        $operations = $item->operations()->get();
        $awards = $item->awards()->get();

        return view('admin.doctors.doctor-infos.show', compact('item', 'departments', 'operations', 'awards'));
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
        $operations = Operation::all();
        $attended_operations = $doctors->operations()->get();
        $awards = AwardDoctor::all();
        $gethered_awards = $doctors->awards()->get();
        $departments = OurServiceDepartment::all();
        $department_doctors = $doctors->departments()->get();

        return view('admin.doctors.doctor-infos.edit', compact(
            'doctors', 'operations', 'attended_operations',
            'awards', 'gethered_awards', 'departments', 'department_doctors'
        ));
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
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");        
            $url = $model->imageUrl().$image_name;
            $data['image'] = $url;
        }
        if($request->file('card_image') !== null)
        {
            $model->deleteCardImage();
            $files = $request->file('card_image');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = $model->imageUrl().$image_name;
            $data['card_image'] = $url;
        }
        $model->update($data);

        $model->departments()->sync($request->our_service_department_id);
        $model->operations()->sync($request->operation_id);
        $model->awards()->sync($request->award_doctor_id);

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
        $model->deleteCardImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
