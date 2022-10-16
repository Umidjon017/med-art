<?php

namespace App\Http\Requests\Api\Contuct;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreContuctUsRequest extends FormRequest
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
            'full_name'     => ['required', 'string', 'max:255'],
            'phone_number'  => ['required', 'string', 'max:255'],
        ]);
    }
}
