<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\AwardDoctor;
use App\Http\Requests\Admin\Doctor\StoreAwardDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateAwardDoctorRequest;
use Illuminate\Http\Request;

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

        return view('admin.doctors.awards.index', compact('items'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/doctors/awards/');
            AwardDoctor::isPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/doctors/awards/".$image_name;
            $data['image'] = $url;
        }
        $news = AwardDoctor::create($data);

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

        return view('admin.doctors.awards.show', compact('item'));
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

        return view('admin.doctors.awards.edit', compact('item'));
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
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/doctors/awards/".$image_name;
            $data['image'] = $url;
        }
        $model->update($data);

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
