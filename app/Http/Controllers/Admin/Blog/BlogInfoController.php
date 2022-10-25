<?php

namespace App\Http\Controllers\Admin\Blog;

use Intervention\Image\Facades\Image;
use App\Models\Admin\Blog\BlogInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogInfoRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogInfoRequest;

class BlogInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BlogInfo::all();

        return view('admin.blogs.blog-infos.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.blog-infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogInfoRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $files = $request->image;
            $destination = public_path('admin/images/blogs/blog-infos/');
            BlogInfo::isPhotoDirectoryExists();
            $image_name = time().'_'.BlogInfo::randomImageName().'.'.$files->getClientOriginalExtension();
            Image::make($files->getRealPath())->save($destination.'/'.$image_name, 50, "jpg");
            $url = BlogInfo::imageUrl().$image_name;
            $data['image'] = $url;
        }
        $doctors = BlogInfo::create($data);

        return redirect()->route('admin.blogs.blog-infos.index')->withSuccess("Ma'lumot qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Blog\BlogInfo  $blogInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = BlogInfo::findOrFail($id);

        return view('admin.blogs.blog-infos.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Blog\BlogInfo  $blogInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = BlogInfo::findOrFail($id);

        return view('admin.blogs.blog-infos.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogInfoRequest  $request
     * @param  \App\Models\Admin\Blog\BlogInfo  $blogInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogInfoRequest $request, $id)
    {
        $model = BlogInfo::findOrFail($id);
        $data = $request->all();
        $destination = public_path('admin/images/blogs/blog-infos/');
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

        return redirect()->route('admin.blogs.blog-infos.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Blog\BlogInfo  $blogInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BlogInfo::findOrFail($id);
        $model->delete();
        $model->deleteImage();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
