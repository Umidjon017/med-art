<?php

namespace App\Http\Requests\Api\Appointment;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return RuleFactory::make([
            'full_name'     =>  ['required', 'string', 'max:255'],
            'email'         =>  ['sometimes', 'email', 'max:255'],
            'phone_number'  =>  ['required', 'string', 'max:255'],
            'date'          =>  ['required', 'string', 'max:255'],
        ]);
    }
}
