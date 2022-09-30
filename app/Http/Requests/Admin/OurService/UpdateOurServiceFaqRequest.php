<?php

namespace App\Http\Requests\Admin\OurService;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOurServiceFaqRequest extends FormRequest
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
            '%question%'    => 'required|string',
            '%answer%'      => 'required|string',
        ]);

    }
    public function messages()
    {
        return [
            'uz.question.required'  => 'O`zbekcha sarlovha to`ldirilishi kerak!',
            'ru.question.required'  => 'Ruscha sarlovha to`ldirilishi kerak!',

            'uz.answer.required' => 'O`zbekcha tavsif to`ldirilishi kerak!',
            'ru.answer.required' => 'Ruscha tavsif to`ldirilishi kerak!',
        ];
    }
}
