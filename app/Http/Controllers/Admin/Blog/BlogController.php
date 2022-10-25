<?php

namespace App\Http\Controllers\Admin\Blog;

use Intervention\Image\Facades\Image;
use App\Models\Admin\Blog\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Blog::all();

        return view('admin.blogs.home-image.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('header_image'))
        {
            $files = $request->header_image;
            $destination = public_path('admin/images/blogs/home-image');
            $image_name = time().'_'.Blog::randomImageName().'.'.$files->getClientOriginalExtension();
            Blog::isPhotoDirectoryExists();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = Blog::imageUrl().$image_name;
            $data['header_image'] = $url;
        }
        $blogs = Blog::create($data);

        return redirect()->route('admin.blogs.home-image.index')->withSuccess("Uy rasmi qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Blog::findOrFail($id);

        return view('admin.blogs.home-image.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        $model = Blog::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/blogs/home-image/');
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
        
        return redirect()->route('admin.blogs.home-image.index')->withSuccess('Uy rasmi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Blog::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Uy rasmi o'chirildi!");
    }
}
