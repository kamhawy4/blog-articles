<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use App\Article;
use App\Categories;
use App\Tag;
use App\TagArticle;
use App\Subscribe;
use Validator;
use App\CommentArticle;
class HomePageController extends Controller
{

    public function Welcome()
    {
      $articles        = Article::orderBy('created_at','desc')->paginate(10);
    	return view('welcome',compact('settings','articles'));
    }

    public function Categorie($slug)
    {
      $categorie       = Categories::where('slug',$slug)->first();
      $articles        = Article::where('categorie_id',$categorie->id)->orderBy('created_at','desc')->paginate(10);
      return view('front.categories.index',compact('categorie','articles'));
    }

    public function Article($slug)
    {
      $articles        = Article::where('slug',$slug)->first();
      $commentsArticle = CommentArticle::where('article_id',$articles->id)->get();
      $tagArticle      = TagArticle::where('article_id',$articles->id)->get();
		  $tagsArticles    = [];
		  foreach ($tagArticle as $key => $value) 
		  {
		      $tagsArticles[] =  Tag::where('id',$value->tag_id)->first();
		  }
      return view('front.articles.index',compact('articles','tagsArticles','commentsArticle'));
    }


    public function Tags($slug)
    {
      $tag             = Tag::where('slug',$slug)->first();
      $tagArticle      = TagArticle::where('tag_id',$tag->id)->get();
      $articles        = [];
      foreach ($tagArticle as $key => $value) 
      {
         $articles[] =  Article::where('id',$value->article_id)->orderBy('created_at','desc')->first();
      }
      return view('front.tags.index',compact('tag','articles'));
    }



    public function Search(Request $request)
    {
      $search          =  $request->get('search');
	    $articles        =  Article::where('title','like','%'.$search.'%')->orderby('id')->paginate(2);
      return view('front.search.index',compact('tag','articles'));
    }



    public function Subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
         'email' => 'required',
        ]);
        if ($validator->fails()) {
          return response()->json(['code'=>202]);  
        }

        $subscribe = Subscribe::get();
         foreach ($subscribe as $value) 
         {
            if($request->email == $value->email)
            {
             return response()->json(['code'=>500]);      
            }
         }

        Subscribe::create($request->all());
        return response()->json(['code'=>200]);  
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
