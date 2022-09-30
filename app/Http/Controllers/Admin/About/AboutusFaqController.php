<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Admin\About\AboutusFaq;
use App\Http\Requests\Admin\About\StoreAboutusFaqRequest;
use App\Http\Requests\Admin\About\UpdateAboutusFaqRequest;

class AboutusFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = AboutusFaq::all();

        return view('admin.about-us.faqs.index', compact('faqs'));
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
     * @param  \App\Http\Requests\StoreAboutusFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutusFaqRequest $request)
    {
        $data = $request->all();
        $aboutUsFaqs = AboutusFaq::create($data);

        return redirect()->route('admin.about-us.faqs.index')->withSuccess("Ma'lumot qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutusFaq  $aboutusFaq
     * @return \Illuminate\Http\Response
     */
    public function show(AboutusFaq $aboutusFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutusFaq  $aboutusFaq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = AboutusFaq::findOrFail($id);

        return view('admin.about-us.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutusFaqRequest  $request
     * @param  \App\Models\AboutusFaq  $aboutusFaq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutusFaqRequest $request, $id)
    {
        $model = AboutusFaq::findOrFail($id);
        $data = $request->all();
        $model->update($data);

        return redirect()->route('admin.about-us.faqs.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutusFaq  $aboutusFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AboutusFaq::findOrFail($id);
        $model->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
