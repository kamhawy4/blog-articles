<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesTranslations extends Model
{
     protected  $table   = 'categories_translations';

    protected $fillable = ['name','slug','categories_id','language'];

    /**
    * @return Categorie Name with categorie_id
    */
}
