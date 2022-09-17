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
        //
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
        //
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
    public function edit(OurServiceFaq $ourServiceFaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOurServiceFaqRequest  $request
     * @param  \App\Models\Admin\OurService\OurServiceFaq  $ourServiceFaq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOurServiceFaqRequest $request, OurServiceFaq $ourServiceFaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\OurService\OurServiceFaq  $ourServiceFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurServiceFaq $ourServiceFaq)
    {
        //
    }
}
