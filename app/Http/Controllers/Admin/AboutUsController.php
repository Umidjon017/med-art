<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAboutUsRequest;
use App\Http\Requests\Admin\UpdateAboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.about-us.index');
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
            $files = $request->file('header_image');
            $destination = public_path('admin/images/about-us/');
            $image_name=time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/about-us/".$image_name;
            $data['header_image'] = $url;
        }

        $aboutus = AboutUs::create($data);

        return redirect()->route('admin.about-us.index')->withSuccess("Rasm qo'shildi");
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
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutUsRequest  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
