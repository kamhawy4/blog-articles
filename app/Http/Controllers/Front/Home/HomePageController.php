<?php

namespace App\Http\Controllers\Front\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\Article,App\Models\Categories,App\Models\CommentArticle;
use Validator;
use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\Categories\CategoriesRepositories;

class HomePageController extends Controller
{

    protected $modelArticles;
    protected $modelCategories;

    public function __construct(Article $article,Categories $categories)
    {
      $this->modelArticles       = new ArticlesRepositories($article);    
      $this->modelCategories     = new CategoriesRepositories($categories);
    }

    /**
    * @return all Articles ::  paginate 10 page 
    */ 
    public function Welcome()
    {

      $articles = $this->modelArticles->orderByDesc('desc')->paginate(10);
    	return view('welcome',compact('articles'));
    }

   /**
   * @return Categories by slug  Articles by id categorie : paginate 10 page 
   */
    public function Categorie($slug)
    {
      $categorie       = $this->modelCategories->whereSlug($slug);
      $articles        = $this->modelArticles->ArticleWhereCategorieId($categorie->id)->orderByDesc('desc')->paginate(10);
      return view('front.categories.index',compact('categorie','articles'));
    }
    
}
