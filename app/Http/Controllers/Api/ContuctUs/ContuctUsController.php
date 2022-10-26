<?php

namespace App\Http\Controllers\Api\ContuctUs;

use App\Models\Admin\Contuct\ContuctUs;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Contuct\StoreContuctUsRequest;

class ContuctUsController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreContuctUsRequest $request)
    {
        $message = <<<TEXT
        Yangi mijoz!

        Mijozning ism-sharifi: {$request->full_name}
        Mijozning telefon raqami: {$request->phone_number}
        TEXT;

        $apiToken = '5507686149:AAFmUGl4nNxfz4UrBYGdsUEBsUKwfVOB_nk';
        $data = [
            'chat_id' => '-1001870762579',
            'text'  =>  $message,
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data));

        $data = $request->all();
        $user = ContuctUs::create($data);

        return $this->sendResponse($user, "Ma'lumotlar muvaffaqiyatli qabul qilindi!");
    }
}
