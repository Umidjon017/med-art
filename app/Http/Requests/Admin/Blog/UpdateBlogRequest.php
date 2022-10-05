<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class UpdateBlogRequest extends FormRequest
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
            'header_image*' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);

    }
    public function messages()
    {
        return [
            'header_image.required' => 'Rasm tanlanishi kerak!',
            'header_image.image'    => 'Rasm bo`lishligi kerak!',
            'header_image.mimes'    => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
        ];
    }
}
