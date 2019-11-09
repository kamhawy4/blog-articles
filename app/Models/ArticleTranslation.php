<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class ArticleTranslation extends Model
{
    protected  $table   = 'articles_translations';

    protected $fillable = ['title','description','slug','author','image','type','categorie_id','articles_id'];

    /**
    * @return Categorie Name with categorie_id
    */
    public function GetNameCategorie()
    {
    	return $this->belongsTo('App\Models\Categories','categorie_id');
    }

    public function GetTags()
    {
    // We have already created pivot table for articles and tags
    return $this->belongsToMany(ArticleTags::class,'article_tags','article_id','tag_id');
    }


    public function Article()
    {
        return $this->belongsTo('App\Models\Article');
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
