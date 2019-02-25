<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected  $table   = 'articles';

    protected $fillable = ['title','description','slug','author','image','type','categorie_id'];

    public function GetNameCategorie()
    {
    	return $this->belongsTo('App\Categories','categorie_id');
    }
}
