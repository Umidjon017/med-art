<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Admin\About\AboutusContent;
use App\Http\Requests\Admin\About\StoreAboutusContentRequest;
use App\Http\Requests\Admin\About\UpdateAboutusContentRequest;

class AboutusContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AboutusContent::all();
        return view('admin.about-us.contents.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about-us.contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutusContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutusContentRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/about-us/contents/');
            AboutusContent::isPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/about-us/contents/".$image_name;
            $data['image'] = $url;
        }
        $news = AboutusContent::create($data);

        return redirect()->route('admin.about-us.contents.index')->withSuccess("Ma'lumot qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = AboutusContent::findOrFail($id);

        return view('admin.about-us.contents.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = AboutusContent::findOrFail($id);

        return view('admin.about-us.contents.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutusContentRequest  $request
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutusContentRequest $request, $id)
    {
        $model = AboutusContent::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/about-us/contents');
        if($request->file('image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('image');
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/about-us/contents/".$image_name;
            $data['image'] = $url;
        }
        $model->update($data);

        return redirect()->route('admin.about-us.contents.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AboutusContent::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
