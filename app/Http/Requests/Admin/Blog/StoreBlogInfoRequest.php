<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreBlogInfoRequest extends FormRequest
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
            'image'         =>  'sometimes|image|mimes:png,jpg,jpeg,gif',
            'link_video'    =>  'sometimes',
            '%title%'       =>  'required',
            '%description%' =>  'required',
            '%theme%'       =>  'sometimes',
        ]);
    }

    public function messages()
    {
        return [
            'image.image'   => 'Rasm bo`lishligi kerak!',
            'image.mimes'   => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',

            'uz.title.required' => 'O`zbekcha ism-sharif to`ldirilishi kerak!',
            'ru.title.required' => 'Ruscha ism-sharif to`ldirilishi kerak!',

            'uz.description.required' => 'O`zbekcha biografiya to`ldirilishi kerak!',
            'ru.description.required' => 'Ruscha biografiya to`ldirilishi kerak!',
        ];
    }
}
