<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticlesRequest extends FormRequest
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
          'en_title'        =>'required|max:255',
          'ar_title'        =>'required|max:255',
          'en_description'  =>'required',
          'ar_description'  =>'required',
          'categorie_id'    =>'required',
          'img'             =>'image|mimes:jpg,jpeg,png,gif|max:22400',
        ];
    }
}
