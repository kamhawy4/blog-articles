<?php

namespace App\Http\Controllers\Front\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\ArticleTranslation,App\Models\Categories,App\Models\CommentArticle,App\Models\Articles;
use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\CommentArticle\CommentArticleRepositories;
use Illuminate\Support\Facades\App;

class ArticlesController extends Controller
{
    

    protected $modelArticles;
    protected $modelCommentArticle;

    function __construct(ArticleTranslation $articleTranslation,CommentArticle $commentArticle,Articles $articles)
    {
      $this->modelArticles       = new ArticlesRepositories($articleTranslation,$commentArticle,$articles);
      $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);
      
    }

    /**
    * @return Article by slug and Comments Article by article id 
    */
    public function Article($slug)
    {
      $articleSlug =  ArticleTranslation::where('slug',$slug)->first();

      if($articleSlug == null){
          return redirect()->to('/');
      }

      $articleId = ArticleTranslation::where('articles_id',$articleSlug->articles_id)->where('language',App::getLocale())->first();

      if($articleId->slug != $slug){
       return redirect()->to(url('article/'.$articleId->slug));
      }

      $articles        = $this->modelArticles->whereSlug($articleId);
      $commentsArticle = $this->modelCommentArticle->show($articleSlug->articles_id);
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
