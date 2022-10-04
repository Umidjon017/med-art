<?php

namespace App\Http\Controllers\Admin\OurService;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurService\OurServiceFaq;
use App\Http\Requests\Admin\OurService\StoreOurServiceFaqRequest;
use App\Http\Requests\Admin\OurService\UpdateOurServiceFaqRequest;

class OurServiceFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = OurServiceFaq::all();

        return view('admin.our-srevice.faqs.index', compact('faqs'));
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
     * @param  \App\Http\Requests\StoreOurServiceFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOurServiceFaqRequest $request)
    {
        $data = $request->all();
        $aboutUsFaqs = OurServiceFaq::create($data);

        return redirect()->route('admin.our-service.faqs.index')->withSuccess("Ma'lumot qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\OurService\OurServiceFaq  $ourServiceFaq
     * @return \Illuminate\Http\Response
     */
    public function show(OurServiceFaq $ourServiceFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\OurService\OurServiceFaq  $ourServiceFaq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = OurServiceFaq::findOrFail($id);

        return view('admin.our-srevice.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOurServiceFaqRequest  $request
     * @param  \App\Models\Admin\OurService\OurServiceFaq  $ourServiceFaq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOurServiceFaqRequest $request, $id)
    {
        $model = OurServiceFaq::findOrFail($id);
        $data = $request->all();
        $model->update($data);

        return redirect()->route('admin.our-service.faqs.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\OurService\OurServiceFaq  $ourServiceFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = OurServiceFaq::findOrFail($id);
        $model->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
