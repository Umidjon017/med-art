<?php

namespace App\Http\Controllers\Admin\Contuct;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contuct\ContuctUs;
use App\Http\Requests\Api\Contuct\StoreContuctUsRequest;
use App\Http\Requests\Api\Contuct\UpdateContuctUsRequest;

class ContuctUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ContuctUs::all();
        $trashed = ContuctUs::onlyTrashed()->get();

        return view('admin.contuct-us.index', compact('items', 'trashed'));
    }

    public function archived()
    {
        $items = ContuctUs::all();
        $trashed = ContuctUs::onlyTrashed()->get();

        return view('admin.contuct-us.archived', compact('items', 'trashed'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ContuctUs::findOrFail($id);
        $model->delete();

        return back()->withSuccess(__($model->full_name. " - mijozga javob berildi!"));
    }

    public function forceDelete($id)
    {
        $model = ContuctUs::withTrashed()->findOrFail($id);
        $model->forceDelete();

        return back()->withSuccess(__($model->full_name. " - mijoz ma'lumotlari o'chirildi!"));
    }

    public function restore($id)
    {
        $model = ContuctUs::withTrashed()->find($id);
        $model->restore();

        return back()->withSuccess(__($model->full_name. " - mijoz ma'lumotlari qaytarildi!"));
    }

    public function restoreAll()
    {
        $mode = ContuctUs::onlyTrashed()->restore();
  
        return back()->withSuccess(__("Barcha mijoz ma'lumotlari qaytarildi!"));
    }
}
