<?php

namespace App\Models;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\General\Translateable;

class Articles extends Model
{

	use Translateable;

    protected  $table   = 'articles';

    protected $fillable = ['author','image','type','categorie_id'];

     public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany('App\Models\ArticleTranslation')->where('language', '=', $language);
    }

    public function GetNameCategorie()
    {
        return $this->belongsTo('App\Models\Categories','categorie_id');
    }

}
