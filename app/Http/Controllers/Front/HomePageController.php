<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings,App\Models\Article,App\Models\Categories,App\Models\CommentArticle;
use Validator;

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
    
}
