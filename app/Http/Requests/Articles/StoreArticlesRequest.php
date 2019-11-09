<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticlesRequest extends FormRequest
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
          'title'        =>'required|max:255|unique:articles_translations',
          'description'  =>'required',
          'categorie_id' =>'required',
          'img'          =>'required|image|mimes:jpg,jpeg,png,gif|max:22400',
        ];
    }
}
