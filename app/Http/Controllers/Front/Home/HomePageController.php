<?php

namespace App\Http\Controllers\Front\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\ArticleTranslation,App\Models\Categories,App\Models\CommentArticle;
use Validator;
use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\Categories\CategoriesRepositories;
use App\Repositories\Tags\TagsRepositories;

use App\Models\CategoriesTranslations;
use App\Models\TagsTranslations;
use App\Models\ArticleTags;
use App\Models\Articles;
use App\Models\Tags;


class HomePageController extends Controller
{

    protected $modelArticles;
    protected $modelCategories;

    public function __construct(ArticleTranslation $articleTranslation,CategoriesTranslations $categoriesTranslations,Categories $categories,ArticleTags $articleTags,Articles $articles,TagsTranslations $tagsTranslations,Tags $tags)
    {
      $this->modelArticles       = new ArticlesRepositories($articleTranslation,$articleTags,$articles);
      $this->modelCategories     = new CategoriesRepositories($categories,$categoriesTranslations);
      $this->modelTags           = new TagsRepositories($tags,$tagsTranslations);
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
      $articles        = $this->modelArticles->ArticleWhereCategorieId($categorie->categories_id)->paginate(10);
      return view('front.categories.index',compact('categorie','articles'));
    }


   /**
   * @return Tag by slug  Articles by id tag : paginate 10 page 
   */
    public function Tag($slug)
    {
      $tag             = $this->modelTags->whereSlug($slug);
      $articles        = $this->modelArticles->ArticleWhereTagId($tag->tags_id);
      return view('front.tags.index',compact('tag','articles'));
    }
    
}
