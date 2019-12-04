<?php

namespace App\Models;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected  $table   = 'tags';

    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany('App\Models\TagsTranslations')->where('language', '=', $language);
    }

}
