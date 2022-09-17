<?php

namespace App\Http\Controllers\Admin\OurService;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurService\OurService;
use App\Http\Requests\Admin\OurService\StoreOurServiceRequest;
use App\Http\Requests\Admin\OurService\UpdateOurServiceRequest;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OurService::all();

        return view('admin.our-srevice.home-image.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreOurServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOurServiceRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('header_image'))
        {
            $files = $request->header_image;
            $destination = public_path('admin/images/our-service/home-image/');
            OurService::isPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/our-service/home-image/".$image_name;
            $data['header_image'] = $url;
        }
        $aboutus = OurService::create($data);

        return redirect()->route('admin.our-service.header_image.index')->withSuccess("Uy rasmi qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function show(OurService $ourService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function edit(OurService $ourService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOurServiceRequest  $request
     * @param  \App\Models\Admin\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOurServiceRequest $request, $id)
    {
        $model = OurService::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/our-service/home-image/');
        if($request->file('header_image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('header_image');
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/our-service/home-image/".$image_name;
            $data['header_image'] = $url;
        }
        $model->update($data);
        
        return redirect()->route('admin.our-service.header_image.index')->withSuccess('Uy rasmi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = OurService::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Uy rasmi o'chirildi!");
    }
}
