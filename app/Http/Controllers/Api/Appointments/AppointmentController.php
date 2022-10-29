<?php

namespace App\Http\Controllers\Api\Appointments;

use App\Models\Admin\Doctor\DoctorInfo;
use App\Http\Controllers\Api\BaseController;
use App\Models\Admin\Appointment\Appointment;
use App\Models\Admin\OurService\OurServiceDepartment;
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
        $ourservices = OurServiceDepartment::all();
        foreach($ourservices as $service)
        {
            if($request->our_service_department_id == $service->id)
            {
                $our_service_name = $service->translate('uz')->name;
            }
        }

        $doctors = DoctorInfo::all();
        foreach($doctors as $doctor)
        {
            if($request->doctor_info_id == $doctor->id)
            {
                $doctor_name = $doctor->translate('uz')->full_name;
            }
        }

        $message = <<<TEXT
        Yangi buyurtma!

        Buyurtma bo'limi: {$our_service_name}
        Buyurtma shifokori: {$doctor_name}
        Buyurtmachining ism-sharifi: {$request->full_name}
        Buyurtmachining emaili: {$request->email}
        Buyurtmachining telefon raqami: {$request->phone_number}
        Buyurtma sanasi: {$request->date}
        TEXT;

        $apiToken = '5507686149:AAFmUGl4nNxfz4UrBYGdsUEBsUKwfVOB_nk';
        $data = [
            'chat_id' => '-1001870762579',
            'text'  =>  $message,
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data));

        $data = $request->all();
        $appointment = Appointment::create($data);

        return $this->sendResponse($appointment, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
