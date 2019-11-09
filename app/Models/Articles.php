<?php

namespace App\Models;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\General\Translateable;

class Articles extends Model
{

	use Translateable;

    protected  $table   = 'articles';

    protected $fillable = ['published'];

     public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany('App\Models\ArticleTranslation')->where('language', '=', $language);
    }

}
