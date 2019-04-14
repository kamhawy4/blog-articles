<?php

namespace App\Http\Controllers\Front\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\Article,App\Models\Categories,App\Models\CommentArticle;
use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\Articles\CommentArticle\CommentArticleRepositories;

class ArticlesController extends Controller
{
    

    protected $modelArticles;
    protected $modelCommentArticle;

    function __construct(Article $article,CommentArticle $commentArticle)
    {
      $this->modelArticles       = new ArticlesRepositories($article);
      $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);
    }

    /**
    * @return Article by slug and Comments Article by article id 
    */
    public function Article($slug)
    {
      $articles        = $this->modelArticles->whereSlug($slug);
      $commentsArticle = $this->modelCommentArticle->show($articles->id);      
      return view('front.articles.index',compact('articles','commentsArticle'));
    }


    /** 
    * create Comments Article
    */
    public function Comments(Request $request)
  	{
  		$this->validate($request,[
  	      'name'   =>'required',
  	      'title'  =>'required',
  	    ]);
         
        // create Comment Article 
  	    $commentArticle       =  $this->modelCommentArticle->store($request);

        // render page  article comments create and returm it
        $html   =  view('front.articles.comments',compact('commentArticle'))->render();
  	    return  response()->json(['status'=> true,'result'=>$html]);
  	}

}
