<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreNewsRequest extends FormRequest
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
            '%header_title%'        => 'required',
            '%header_description%'  => 'required',
            'header_image*'         => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);

    }
    public function messages()
    {
        return [
            'uz.header_title.required'   => 'O`zbekcha uy-sarlovha to`ldirilishi kerak!',
            'ru.header_title.required'   => 'Ruscha uy-sarlovha to`ldirilishi kerak!',

            'uz.header_description.required' => 'O`zbekcha uy-tavsif to`ldirilishi kerak!',
            'ru.header_description.required' => 'Ruscha uy-tavsif to`ldirilishi kerak!',

            'header_image.required' => 'Rasm tanlanishi kerak!',
            'header_image.image'    => 'Rasm bo`lishligi kerak!',
            'header_image.mimes'    => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
