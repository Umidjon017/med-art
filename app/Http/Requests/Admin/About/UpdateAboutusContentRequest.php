<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class UpdateAboutusContentRequest extends FormRequest
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
            '%title_1%'         => 'required',
            '%title_2%'         => 'required',
            '%description_1%'   => 'required',
            '%description_2%'   => 'required',
            'image*'            => 'sometimes|image|mimes:png,jpg,jpeg,gif',
        ]);

    }
    public function messages()
    {
        return [
            'uz.title_1.required'   => 'O`zbekcha sarlovha to`ldirilishi kerak!',
            'ru.title_1.required'   => 'Ruscha sarlovha to`ldirilishi kerak!',
            
            'uz.title_2.required'   => 'O`zbekcha sarlovha to`ldirilishi kerak!',
            'ru.title_2.required'   => 'Ruscha sarlovha to`ldirilishi kerak!',
            
            'uz.description_1.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description_1.required' => 'Ruscha tavsif to`ldirilishi kerak!',

            'uz.description_2.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description_2.required' => 'Ruscha tavsif to`ldirilishi kerak!',

            'image.image'             => 'Rasm bo`lishligi kerak!',
            'image.mimes'             => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
