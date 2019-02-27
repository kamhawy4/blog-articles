<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use File;
class Article extends Model
{
    protected  $table   = 'articles';

    protected $fillable = ['title','description','slug','author','image','type','categorie_id'];

    /**
    * @return Categorie Name with categorie_id
    */
    public function GetNameCategorie()
    {
    	return $this->belongsTo('App\Models\Categories','categorie_id');
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
