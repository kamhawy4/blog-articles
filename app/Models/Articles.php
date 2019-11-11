<?php

namespace App\Models;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\General\Translateable;
use File;
class Articles extends Model
{

	//use Translateable;

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

    public function GetTags()
    {
    // We have already created pivot table for articles and tags
    return $this->belongsToMany(ArticleTags::class,'article_tags','article_id','tag_id');
    }

     /*
    *  delete article image in folder uploads  When delete Articles data
    */
    public function delete()
    {
     $small  = public_path().'/uploads/articles'.'/100x100/'.$this->image;
     $big    = public_path().'/uploads/articles'.'/'.$this->image;
     File::delete($big,$small);
     parent::delete();
    }


}
