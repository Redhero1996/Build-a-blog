<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => ['bail', 'required', 'max:255', new Uppercase],
            'slug'          => ['bail', 'required', 'max:255', 'min:5' ],
            'category_id'   => ['bail', 'required', 'integer'],
            'body'          => ['bail', 'required'],
            'featured_image'=> ['bail', 'sometimes', 'image'],
        ];
    }
}
