<?php

namespace App\Http\Controllers\Api\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Repositories\Articles\ArticlesRepositories;
use App\Models\Article;


class ArticleController extends Controller
{
	// space that we can use the repository from
    protected $modelArticles;

	function __construct(Article $article)
	{

	  $this->modelArticles       = new ArticlesRepositories($article);
	}

	// Return 10 Articles
    public function index()
    {
      $articles = $this->modelArticles->pagination(10);
      return response()->json(['status'=>true,'code'=>200,'response'=>$articles]);
    }


	// Return 5  Recent Articles
    public function RecentArtical()
    {
      $articles = $this->modelArticles->pagination(5);
      return response()->json(['status'=>true,'code'=>200,'response'=>$articles]);
    }

}
