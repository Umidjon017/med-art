<?php

namespace App\Http\Requests\Admin\Sponsor;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class UpdateSponsorRequest extends FormRequest
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
            'name'  =>  'required',
            'image' =>  'image|mimes:png,jpg,jpeg,gif',
        ]);
    }

    public function messages()
    {
        return [
            'name.required' => 'Nomi to`ldirilishi kerak!',

            'image.image'   => 'Rasm bo`lishligi kerak!',
            'image.mimes'   => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
