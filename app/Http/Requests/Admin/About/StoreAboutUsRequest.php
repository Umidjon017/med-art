<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreAboutUsRequest extends FormRequest
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
            '%title%'       => 'required',
            '%description%' => 'required',
            'header_image*' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
    }
    
    public function messages()
    {
        return [
            'uz.title.required'   => 'O`zbekcha sarlovha to`ldirilishi kerak!',
            'ru.title.required'   => 'Ruscha sarlovha to`ldirilishi kerak!',

            'uz.description.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.description.required' => 'Ruscha tavsif to`ldirilishi kerak!',
            
            'header_image.required' => 'Rasm tanlanishi kerak!',
            'header_image.image'    => 'Rasm bo`lishligi kerak!',
            'header_image.mimes'    => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
