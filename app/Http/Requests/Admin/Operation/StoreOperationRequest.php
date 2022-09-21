<?php

namespace App\Http\Requests\Admin\Operation;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreOperationRequest extends FormRequest
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
            'header_image'      =>  'sometimes|image|mimes:png,jpg,jpeg,gif',
            'detail_image'      =>  'sometimes|image|mimes:png,jpg,jpeg,gif',
            'date'              =>  'sometimes',
            'link_video'        =>  'sometimes',
            '%title%'           =>  'required|string',
            '%detail_description%' =>  'required|string',
            '%full_description%'   =>  'required|string',
        ]);
    }

    public function messages()
    {
        return [
            'header_image.image'    => 'Rasm bo`lishligi kerak!',
            'header_image.mimes'    => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
            
            'detail_image.image'    => 'Rasm bo`lishligi kerak!',
            'detail_image.mimes'    => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',

            'uz.title.required' => 'O`zbekcha ism-sharif to`ldirilishi kerak!',
            'ru.title.required' => 'Ruscha ism-sharif to`ldirilishi kerak!',

            'uz.detail_description.required' => 'O`zbekcha biografiya to`ldirilishi kerak!',
            'ru.detail_description.required' => 'Ruscha biografiya to`ldirilishi kerak!',
            
            'uz.full_description.required' => 'O`zbekcha mutaxasisligi to`ldirilishi kerak!',
            'ru.full_description.required' => 'Ruscha mutaxasisligi to`ldirilishi kerak!',
        ];
    }
}
