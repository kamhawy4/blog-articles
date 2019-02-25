<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected  $table   = 'categories';

    protected $fillable = ['name','slug'];
   
    public function getArticls()
	{
	  return $this->hasMany('App\Article','categorie_id');
	}
}
