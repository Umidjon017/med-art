<?php

namespace App\Http\Controllers\Admin\About;

use App\Models\Admin\About\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\StoreAboutUsRequest;
use App\Http\Requests\Admin\About\UpdateAboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AboutUs::all();
        return view('admin.about-us.home-image.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreAboutUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutUsRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('header_image'))
        {
            $files = $request->header_image;
            $destination = public_path('admin/images/about-us/home-image/');
            AboutUs::isPhotoDirectoryExists();
            $image_name = time().'_'.AboutUs::randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);
            $url = AboutUs::imageUrl().$image_name;
            $data['header_image'] = $url;
        }
        $aboutus = AboutUs::create($data);

        return redirect()->route('admin.about-us.home-image.index')->withSuccess("Uy rasmi qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = AboutUs::findOrFail($id);

        return view('admin.about-us.home-image.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutUsRequest  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutUsRequest $request, $id)
    {
        $model = AboutUs::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/about-us/home-image/');
        if($request->file('header_image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('header_image');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);
            $url = $model->imageUrl().$image_name;
            $data['header_image'] = $url;
        }
        $model->update($data);
        
        return redirect()->route('admin.about-us.home-image.index')->withSuccess('Uy rasmi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AboutUs::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Uy rasmi o'chirildi!");
    }
}
