<?php

namespace App\Http\Requests\Admin\OurService;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreOurServiceDepartmentRequest extends FormRequest
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
            '%name%'        => 'required|string',
            '%description%' => 'required|string',
            'image*'        => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);

    }
    public function messages()
    {
        return [
            'uz.name.required'  => 'O`zbekcha sarlovha to`ldirilishi kerak!',
            'ru.name.required'  => 'Ruscha sarlovha to`ldirilishi kerak!',

            'uz.description.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description.required' => 'Ruscha tavsif to`ldirilishi kerak!',

            'image.required'    => 'Rasm tanlanishi kerak!',
            'image.image'       => 'Rasm bo`lishligi kerak!',
            'image.mimes'       => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
