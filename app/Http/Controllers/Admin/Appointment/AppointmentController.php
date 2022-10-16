<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appointment\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Appointment::all();
        $trashed = Appointment::onlyTrashed()->get();

        return view('admin.appointment.index', compact('items', 'trashed'));
    }

    public function archived()
    {
        $items = Appointment::all();
        $trashed = Appointment::onlyTrashed()->get();

        return view('admin.appointment.archived', compact('items', 'trashed'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Appointment\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Appointment\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Appointment::findOrFail($id);
        $model->delete();

        return back()->withSuccess(__($model->full_name. " - mijozga javob berildi!"));
    }

    public function forceDelete($id)
    {
        $model = Appointment::withTrashed()->findOrFail($id);
        $model->forceDelete();

        return back()->withSuccess(__($model->full_name. " - mijoz ma'lumotlari o'chirildi!"));
    }

    public function restore($id)
    {
        $model = Appointment::withTrashed()->find($id);
        $model->restore();

        return back()->withSuccess(__($model->full_name. " - mijoz ma'lumotlari qaytarildi!"));
    }

    public function restoreAll()
    {
        $mode = Appointment::onlyTrashed()->restore();
  
        return back()->withSuccess(__("Barcha mijoz ma'lumotlari qaytarildi!"));
    }
}
