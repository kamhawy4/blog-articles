<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected  $table   = 'categories';

    protected $fillable = ['name','slug'];
   
    /**
    * @return  Articls by categorie_id
    */
    public function getArticls()
	{
	  return $this->hasMany('App\Models\Article','categorie_id');
	}
}
