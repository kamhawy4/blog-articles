<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Articles\StoreArticlesRequest;
use App\Http\Requests\Articles\UpdateArticlesRequest;
use App\Models\Categories,App\Models\Article,App\Models\CommentArticle;
use Storage,Session,Image,Auth,DB,File;

class ArticleController extends Controller
{
   public function index()
    {
       $articles =  Article::get(); 
       return view('admin.articles.index',compact('articles'));
    }

    public function create()
    {  
       $categorys =  Categories::get(); 
       return view('admin.articles.create',compact('categorys'));   
    }

    public function edit($id)
    {
	   $update     =  Article::findOrFail($id);
	   $categorys  =  Categories::get();
       return view('admin.articles.edit',compact('update','categorys'));
    }


	public function store(StoreArticlesRequest $request)
	{
	    if($request->hasFile('img'))
		{
			$img       	=  Input::file('img');
			$ext       	=  $img->getClientOriginalExtension();
			$path      	=  public_path().'/uploads/articles';
			$fullename 	=  time().'.'.$ext;
			$img		-> move($path,$fullename);
			$imag     	=  Image::make($path.'/'.$fullename);
			$imag	    -> resize(100,100)->save($path.'/100x100/'.$fullename);
			$request 	-> merge(['image'=>$fullename]);
		}

        $request  -> merge(['author'=>Auth::guard('managers')->user()->name]); 
        $request  -> merge(['slug'=>$this->make_slug($request->title)]); 
	    $article  =  Article::create($request->all());

	    session()->flash('success','Article added successfully');
	    return redirect()->to(url('dashboard/articles'));
	}


	public function update($id,UpdateArticlesRequest $request)
	{
		$update    =  Article::findOrFail($id); 
		$request  -> merge(['slug'=>$this->make_slug($request->title)]); 

		if($request->hasFile('img'))
		{
			$img       	=  Input::file('img');
			$ext       	=  $img->getClientOriginalExtension();
			$path      	=  public_path().'/uploads/articles';
			$fullename 	=  time().'.'.$ext;
			$img		-> move($path,$fullename);
			$imag 	    =  Image::make($path.'/'.$fullename);
			$imag	    -> resize(100,100)->save($path.'/100x100/'.$fullename);
			$request 	-> merge(['image'=>$fullename]);
			$small      =  public_path().'/uploads/articles'.'/100x100/'.$update->image;
            $big        =  public_path().'/uploads/articles'.'/'.$update->image;
            File::delete($big,$small);
		}

		$update    -> update($request->all());
		session()  -> flash('success','Modified successfully');
		return redirect()->to(url('dashboard/articles'));
	}

	public function CommentsArticle($id)
	{
	  $commentArticles =  CommentArticle::where('article_id',$id)->get();	
	  return view('admin.articles.comments',compact('commentArticles'));
	}

	public function DeleteComments($id)
	{
	    $delete  =  CommentArticle::findOrFail($id);
		$delete  -> delete();
		session()->flash('success','Successfully deleted');
		return back();
	}

	public function destroy($id)
	{
		$delete  =  Article::findOrFail($id);
		$delete  -> delete();
		session()->flash('success','Successfully deleted');
		return redirect()->to(url('dashboard/articles'));
	}


	public function DeleteArticle(Request $request)
	{
        if($request->check != '')
        {
		  Article::destroy($request->check); 
		  session()->flash('success','Successfully deleted');
		  return back();
          }else{
		  session()->flash('warning','Please select at least one article');
		  return back();
        } 
    }
}
