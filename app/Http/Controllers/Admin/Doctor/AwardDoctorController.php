<?php

namespace App\Http\Controllers\Admin\Doctor;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Models\Admin\Doctor\AwardDoctor;
use App\Http\Requests\Admin\Doctor\StoreAwardDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateAwardDoctorRequest;

class AwardDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AwardDoctor::all();
        $doctors = DoctorInfo::all();

        return view('admin.doctors.awards.index', compact('items', 'doctors'));
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
     * @param  \App\Http\Requests\StoreAwardDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAwardDoctorRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/doctors/awards/');
            AwardDoctor::isPhotoDirectoryExists();
            $image_name = time().'_'.AwardDoctor::randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = AwardDoctor::imageUrl().$image_name;
            $data['image'] = $url;
        }
        $awards = AwardDoctor::create($data);

        $doctors = $request->doctor_id;
        if ($doctors != '') {
            foreach ($doctors as $doctor) {
                $awards->doctors()->attach($doctor);
            }
        }

        return redirect()->route('admin.doctors.award.index')->withSuccess("Ma'lumot qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\AwardDoctor  $awardDoctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = AwardDoctor::findOrFail($id);
        $awarded_doctors = $item->doctors()->get();

        return view('admin.doctors.awards.show', compact('item', 'awarded_doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor\AwardDoctor  $awardDoctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = AwardDoctor::findOrFail($id);
        $doctors = DoctorInfo::all();
        $awarded_doctors = $item->doctors()->get();

        return view('admin.doctors.awards.edit', compact('item', 'doctors', 'awarded_doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAwardDoctorRequest  $request
     * @param  \App\Models\Admin\Doctor\AwardDoctor  $awardDoctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAwardDoctorRequest $request, $id)
    {
        $model = AwardDoctor::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/doctors/awards/');
        if($request->file('image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('image');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = $model->imageUrl().$image_name;
            $data['image'] = $url;
        }
        $model->update($data);
        
        $model->doctors()->sync($request->doctor_id);

        return redirect()->route('admin.doctors.award.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor\AwardDoctor  $awardDoctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AwardDoctor::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
