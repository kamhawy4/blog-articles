<?php

namespace App\Http\Controllers\Api\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Categories;
use App\Repositories\Categories\CategoriesRepositories;
use App\Models\CategoriesTranslations;


class CategoriesController extends Controller
{
    protected $modelCategories;

	public function __construct(CategoriesTranslations $categoriesTranslations,Categories $categories)
	{
		$this->modelCategories  = new CategoriesRepositories($categoriesTranslations,$categories);	   
	}

   // Return All Categories  
    public function index()
    {
      $categorys = $this->modelCategories->all();
      $this->object_push($categorys,['name']);

      if(!$categorys->isEmpty()){
        foreach ($categorys as  $category) {
           $category->count_artical =  $category->getArticls()->count();
         }
        }
      return response()->json(['status'=>true,'code'=>200,'response'=>$categorys]);
    }

}
