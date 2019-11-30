<?php

namespace  App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected  $table   = 'categories';

    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany('App\Models\CategoriesTranslations')->where('language', '=', $language);
    }

    public function getArticls()
	{
	  return $this->hasMany('App\Models\Articles','id');
	}
}
