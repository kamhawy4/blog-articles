<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\Article,App\Models\Categories,App\Models\CommentArticle;

class ArticlesController extends Controller
{
    
    public function Article($slug)
    {
      $articles        = Article::where('slug',$slug)->first();
      $commentsArticle = CommentArticle::where('article_id',$articles->id)->get();
      return view('front.articles.index',compact('articles','commentsArticle'));
    }



    public function Comments(Request $request)
  	{
  		$this->validate($request,[
  	      'name'   =>'required',
  	      'title'  =>'required',
  	    ]);
          
  	    $commentArticle       =  CommentArticle::create($request->all());
        $html                 =  view('front.articles.comments',compact('commentArticle'))->render();
  	    return response()->json(['status'=> true,'result'=>$html]);
  	}

}
