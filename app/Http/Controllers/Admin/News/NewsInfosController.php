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
     * @param  \App\Http\Requests\StoreNewsInfosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsInfosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function show(NewsInfos $newsInfos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsInfos $newsInfos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsInfosRequest  $request
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsInfosRequest $request, NewsInfos $newsInfos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\News\NewsInfos  $newsInfos
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsInfos $newsInfos)
    {
        //
    }
}
