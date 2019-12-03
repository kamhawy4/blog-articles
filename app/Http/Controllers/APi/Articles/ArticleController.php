<?php

namespace App\Http\Controllers\Api\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Repositories\Articles\ArticlesRepositories;
use App\Models\ArticleTranslation,App\Models\ArticleTags,App\Models\Articles;

class ArticleController extends Controller
{
	// space that we can use the repository from
    protected $modelArticles;

	function __construct(ArticleTranslation $articleTranslation,ArticleTags $articleTags,Articles $articles)
	{
	  $this->modelArticles       = new ArticlesRepositories($articleTranslation,$articleTags,$articles);
	}

	// Return 10 Articles
    public function index()
    {
      $articles = $this->modelArticles->pagination(10);
       $this->modelArticles->object_push($articles,['title','description']);
      /*foreach ($articles as $key => $article) {
            $article->title =  $article->translation()->first()->title;
      }*/
      return response()->json(['status'=>true,'code'=>200,'response'=>$articles]);
    }

    // Return 10 Articles by Categroy
    public function ArticlesByCategroy($categorieId)
    {
      $articles  = $this->modelArticles->ArticleWhereCategorieId($categorieId)->paginate(10);
      return response()->json(['status'=>true,'code'=>200,'response'=>$articles]);
    }

    // Return 10 Articles by Tag
    public function ArticlesByTag($tagId)
    {
      $tags = $this->modelArticles->ArticleWhereTagId($tagId);
      return response()->json(['status'=>true,'code'=>200,'response'=>$tags]);
    }


    // Return single Article by id
    public function ArticleById($id)
    {
      $article       = $this->modelArticles->show($id);
      $tagsArtical   = $this->modelArticles->whereTagsArticalId($id);
      $article->tags = $tagsArtical;
      return response()->json(['status'=>true,'code'=>200,'response'=>$article]);      
    }


	// Return 5  Recent Articles
    public function RecentArtical()
    {
      $articles = $this->modelArticles->pagination(5);
      return response()->json(['status'=>true,'code'=>200,'response'=>$articles]);
    }

}
