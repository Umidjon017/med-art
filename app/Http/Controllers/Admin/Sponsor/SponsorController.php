<?php

namespace App\Http\Controllers\Admin\Sponsor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sponsor\Sponsor;
use App\Http\Requests\Admin\Sponsor\StoreSponsorRequest;
use App\Http\Requests\Admin\Sponsor\UpdateSponsorRequest;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Sponsor::all();

        return view('admin.sponsors.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreSponsorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSponsorRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/sponsors/');
            Sponsor::isPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/sponsors/".$image_name;
            $data['image'] = $url;
        }
        $sponsor = Sponsor::create($data);

        return redirect()->route('admin.sponsors.index')->withSuccess("Homiy qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Sponsor\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Sponsor\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorRequest  $request
     * @param  \App\Models\Admin\Sponsor\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsorRequest $request, $id)
    {
        $model = Sponsor::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/sponsors/');
        if($request->file('image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('image');
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/sponsors/".$image_name;
            $data['image'] = $url;
        }
        $model->update($data);

        return redirect()->route('admin.sponsors.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Sponsor\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Sponsor::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
