<?php

namespace App\Http\Controllers;

use App\Models\AboutusContent;
use App\Http\Requests\StoreAboutusContentRequest;
use App\Http\Requests\UpdateAboutusContentRequest;

class AboutusContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view();
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
     * @param  \App\Http\Requests\StoreAboutusContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutusContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function show(AboutusContent $aboutusContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutusContent $aboutusContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutusContentRequest  $request
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutusContentRequest $request, AboutusContent $aboutusContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutusContent  $aboutusContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutusContent $aboutusContent)
    {
        //
    }
}
