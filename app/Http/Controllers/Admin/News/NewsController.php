<?php

namespace App\Http\Controllers\Admin\News;

use Intervention\Image\Facades\Image;
use App\Models\Admin\News\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = News::all();

        return view('admin.news.home-image.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('header_image'))
        {
            $files = $request->header_image;
            $destination = public_path('admin/images/news/home-image/');
            News::isPhotoDirectoryExists();
            $image_name = time().'_'.News::randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = News::imageUrl().$image_name;
            $data['header_image'] = $url;
        }
        $aboutus = News::create($data);

        return redirect()->route('admin.news.home-image.index')->withSuccess("Uy rasmi qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\News\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\News\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = News::findOrFail($id);

        return view('admin.news.home-image.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\Admin\News\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $model = News::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/news/home-image/');
        if($request->file('header_image') !== null)
        {
            $model->deleteImage();
            $files = $request->file('header_image');
            $image_name = time().'_'.$model->randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = $model->imageUrl().$image_name;
            $data['header_image'] = $url;
        }
        $model->update($data);
        
        return redirect()->route('admin.news.home-image.index')->withSuccess('Uy rasmi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\News\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = News::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Uy rasmi o'chirildi!");
    }
}
