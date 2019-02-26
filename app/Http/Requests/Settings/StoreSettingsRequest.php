<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
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
          'name_site'        => 'required|min:1|max:35',
          'email'            => 'required|email',
          'phone'            => 'required|numeric',
          'meta_keywords'    => 'required',
          'address'          => 'required',
          'meta_description' => 'required',
          'brief_site'       => 'required',
          'logo_main'        => 'image|mimes:jpeg,bmp,png',
          'fav_main'         => 'image|mimes:jpeg,bmp,png',
        ];
    }
}
