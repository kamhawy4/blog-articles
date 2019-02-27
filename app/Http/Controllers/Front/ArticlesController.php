<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\Article,App\Models\Categories,App\Models\CommentArticle;

class ArticlesController extends Controller
{
    
    /**
    * @return Article by slug and Comments Article by article id 
    */
    public function Article($slug)
    {
      $articles        = Article::where('slug',$slug)->first();
      $commentsArticle = CommentArticle::where('article_id',$articles->id)->get();
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
  	    $commentArticle       =  CommentArticle::create($request->all());

        // render page  article comments create and returm it
        $html   =  view('front.articles.comments',compact('commentArticle'))->render();
  	    return response()->json(['status'=> true,'result'=>$html]);
  	}

}
