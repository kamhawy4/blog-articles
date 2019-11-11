<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class ArticleTranslation extends Model
{
    protected  $table   = 'articles_translations';

    protected $fillable = ['title','description','slug','articles_id','language'];

    /**
    * @return Categorie Name with categorie_id
    */

    public function Article()
    {
        return $this->belongsTo('App\Models\Article');
    }
    
}
