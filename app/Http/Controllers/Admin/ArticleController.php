<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Categories,App\Models\Article,App\Models\CommentArticle;

use Storage,Session,Image,Auth,DB;


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


	public function store(Request $request)
	{
		$this->validate($request,[
	      'title'        =>'required|max:255|unique:articles',
	      'description'  =>'required',
	      'categorie_id' =>'required',
	      'img'          =>'required|image|mimes:jpg,jpeg,png,gif|max:22400',
	    ]);

	    if($request->hasFile('img'))
	    {
            $image      = $request->file('img');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img        = Image::make($image->getRealPath());

            $img->resize(120, 120, function($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::put('article'.'/'.$fileName, $img, 'public');
            Storage::put('article/100x100'.'/'.$fileName, $img, 'public');
            $request->merge(['image'=>'article'.'/'.$fileName]);
	    }


        $request  -> merge(['author'=>Auth::guard('managers')->user()->username]); 
        $request  -> merge(['slug'=>$this->make_slug($request->title)]); 
	    $article  =  Article::create($request->all());

	    session()->flash('success','Article added successfully');
	    return redirect()->to(url('dashboard/articles'));
	}


	public function update($id,Request $request)
	{
		$this   -> validate($request,[
	      'title'       =>'required|max:255',
	      'description' =>'required',
	      'img'         =>'image|mimes:jpg,jpeg,png,gif|max:22400',
	      'categorie_id' =>'required',
	    ]);
		$update    =  Article::findOrFail($id); 
		$request  -> merge(['slug'=>$this->make_slug($request->title)]); 
		if($request->hasFile('img'))
		{
			!empty($update->image)?Storage::delete($update->image):'';

			$image      = $request->file('img');
			$fileName   = time() . '.' . $image->getClientOriginalExtension();
			$img        = Image::make($image->getRealPath());

			$img->resize(120, 120, function($constraint) {
			$constraint->aspectRatio();                 
			});
			$img->stream(); // <-- Key point
			Storage::put('article'.'/'.$fileName, $img, 'public');
			Storage::put('article/100x100'.'/'.$fileName, $img, 'public');
			$request->merge(['image'=>'article'.'/'.$fileName]);
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
