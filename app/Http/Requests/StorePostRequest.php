<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=> 'required|unique:posts|min:3',
            'category'=> 'required|exists:categories,id',
            'description'=> 'required|min:10',
            'featured_image'=> 'nullable|mimes:jpeg,png|file|max:512'
        ];
    }
}
