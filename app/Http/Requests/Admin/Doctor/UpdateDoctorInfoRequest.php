<?php

namespace App\Http\Requests\Admin\Doctor;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorInfoRequest extends FormRequest
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
            'image'             =>  'sometimes|image|mimes:png,jpg,jpeg,gif',
            '%full_name%'       =>  'required',
            '%biography%'       =>  'required',
            '%specification%'   =>  'required',
            '%edu_bachelor%'    =>  'sometimes',
            '%edu_master%'      =>  'sometimes',
            '%edu_phd%'         =>  'sometimes',
            '%edu_asperanture%' =>  'sometimes',
            '%edu_addition%'    =>  'sometimes',
            '%description%'     =>  'sometimes',
        ]);
    }

    public function messages()
    {
        return [
            'image.image'   => 'Rasm bo`lishligi kerak!',
            'image.mimes'   => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',

            'uz.full_name.required' => 'O`zbekcha ism-sharif to`ldirilishi kerak!',
            'ru.full_name.required' => 'Ruscha ism-sharif to`ldirilishi kerak!',

            'uz.biography.required' => 'O`zbekcha biografiya to`ldirilishi kerak!',
            'ru.biography.required' => 'Ruscha biografiya to`ldirilishi kerak!',
            
            'uz.specification.required' => 'O`zbekcha mutaxasisligi to`ldirilishi kerak!',
            'ru.specification.required' => 'Ruscha mutaxasisligi to`ldirilishi kerak!',
        ];
    }
}
