<?php

namespace App\Http\Controllers\Admin\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Articles\StoreArticlesRequest;
use App\Http\Requests\Articles\UpdateArticlesRequest;
use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\CommentArticle\CommentArticleRepositories;
use App\Repositories\Categories\CategoriesRepositories;
use App\Models\Categories,App\Models\Article,App\Models\CommentArticle;
use Storage,Session,Image,Auth,DB,File;


class ArticleController extends Controller
{
	//PROPRTE Upload
    const PATH      = '/uploads/articles';
    const SUBPATH   = '/100x100/';
    const SIZE      = '100,100';
    const NAMEFILE  = 'img';
	const NAMEMERGE = 'image';
	

	// space that we can use the repository from
    protected $modelArticles;
    protected $modelCategories;
    protected $modelCommentArticle;
    

	function __construct(Article $article,Categories $categories,CommentArticle $commentArticle)
	{

	  $this->modelArticles       = new ArticlesRepositories($article);
	  $this->modelCategories     = new CategoriesRepositories($categories);
	  $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);
	}

	// Return view page index articles And Return All Articles	 
    public function index()
    {
      $articles = $this->modelArticles->all();
      return view('admin.articles.index',compact('articles'));
    }


	// Return view page create articles And Return All Categories
    public function create()
    {  
       $categorys = $this->modelCategories->all();
       return view('admin.articles.create',compact('categorys'));   
    }

	// Return view page Edit Article And Return article by id and All Categories
    public function edit($id)
    {
	   $update    =  $this->modelArticles->show($id);
       $categorys =  $this->modelCategories->all();
       return view('admin.articles.edit',compact('update','categorys'));
    }

 
	// Store Article 
	public function store(StoreArticlesRequest $request)
	{
		//uploade image
        $this->uploadIMage($request,self::PATH,self::SUBPATH,self::SIZE,self::NAMEFILE,self::NAMEMERGE);

		//Merge Author And Slug
        $request  -> merge(['author'=>Auth::guard('managers')->user()->name]); 
        $request  -> merge(['slug'=>$this->make_slug($request->title)]);

        // repo store data
        $this->modelArticles->store($request);

	    session()->flash('success','Article added successfully');
	    return redirect()->to(url('dashboard/articles'));
	}


	// update Article 
	public function update($id,UpdateArticlesRequest $request)
	{
		// Get Article by id And Merge Slug  
	    $update    =  $this->modelArticles->show($id);
		$request  ->  merge(['slug'=>$this->make_slug($request->title)]);
         
        //upload image  
        $this->updateImage($update,$request,self::PATH,self::SUBPATH,self::SIZE,self::NAMEFILE,self::NAMEMERGE);
        
        //update data
        $this->modelArticles->update($request,$id);

        // Message success After Update
		session()  -> flash('success','Modified successfully');
		return redirect()->to(url('dashboard/articles'));
	}

    
    // destroy Article by id 
	public function destroy($id)
	{
		$this->modelArticles->delete($id);
		session()->flash('success','Successfully deleted');
		return redirect()->to(url('dashboard/articles'));
	}


    // destroy Multi Article by id 
	public function DeleteArticle(Request $request)
	{
        if(!empty($request->check))
        {
		   $this->modelArticles->deleteArticalCheck($request->check);
		   session()->flash('success','Successfully deleted');
		   return back();
            }else{
		   session()->flash('warning','Please select at least one article');
		   return back();
        } 
    }

}
