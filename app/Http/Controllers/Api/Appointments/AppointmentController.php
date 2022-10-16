<?php

namespace App\Http\Controllers\Api\Appointments;

use App\Http\Controllers\Api\BaseController;
use App\Models\Admin\Appointment\Appointment;
use App\Http\Requests\Api\Appointment\StoreAppointmentRequest;

class AppointmentController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreAppointmentRequest $request)
    {
        // $appointment = Appointment::all();
        $data = $request->all();
        // $appointment->service()->save();
        // $appointment->doctor()->save();
        $appointment = Appointment::create($data);

        return $this->sendResponse($appointment, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
