<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\Admin\News\NewsInfos;
use App\Http\Requests\Admin\News\StoreNewsInfosRequest;
use App\Http\Requests\Admin\News\UpdateNewsInfosRequest;

class NewsInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = NewsInfos::all();

        return view('admin.news.news-infos.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news-infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsInfosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsInfosRequest $request)
    {
        $data = $request->all();
        // $ip = $request->ip();
        // $data['view'] = BlogInfo::increment($ip);

        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/news/news-infos/');
            NewsInfos::isPhotoDirectoryExists();
            $image_name = time().'_'.NewsInfos::randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);
            $url = NewsInfos::imageUrl().$image_name;
            $data['image'] = $url;
        }
        $doctors = NewsInfos::create($data);

        return redirect()->route('admin.news.news-infos.index')->withSuccess("Ma'lumot qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = NewsInfos::findOrFail($id);

        return view('admin.news.news-infos.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsInfos::findOrFail($id);

        return view('admin.news.news-infos.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsInfosRequest  $request
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsInfosRequest $request, $id)
    {
        $model = NewsInfos::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/news/news-infos/');
        if($request->file('image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('image');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            $files->move($destination, $image_name);            
            $url = $model->imageUrl().$image_name;
            $data['image'] = $url;
        }
        $model->update($data);

        return redirect()->route('admin.news.news-infos.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = NewsInfos::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
