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
use App\Repositories\Tags\TagsRepositories;
use App\Models\Categories,App\Models\Article,App\Models\CommentArticle,App\Models\Tags,App\Models\ArticleTags;
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
    protected $modelTags;
    protected $modelCategories;
    protected $modelCommentArticle;
    

	function __construct(Article $article,Tags $tags,Categories $categories,CommentArticle $commentArticle,ArticleTags $articleTags)
	{
	  $this->modelArticles       = new ArticlesRepositories($article,$articleTags);
	  $this->modelCategories     = new CategoriesRepositories($categories);
	  $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);
	  $this->modelTags           = new TagsRepositories($tags);

      $this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index','store']]);
      $this->middleware('permission:article-create', ['only' => ['create','store']]);
      $this->middleware('permission:article-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:article-delete', ['only' => ['destroy']]);

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
       $tags      = $this->modelTags->all();
       return view('admin.articles.create',compact('categorys','tags'));   
    }

	// Return view page Edit Article And Return article by id and All Categories
    public function edit($id)
    {
	   $update       =  $this->modelArticles->show($id);
       $categorys    =  $this->modelCategories->all();
       $tags         =  $this->modelTags->all();
       $tagsArticle  =  $this->modelArticles->whereTagsArticalId($id);

       return view('admin.articles.edit',compact('update','categorys','tags','tagsArticle'));
    }

 
	// Store Article 
	public function store(StoreArticlesRequest $request)
	{
		//uploade image
        $this->uploadIMage($request,self::PATH,self::SUBPATH,self::SIZE,self::NAMEFILE,self::NAMEMERGE);

		//Merge Author And Slug
        $request  -> merge(['author'=>Auth::user()->name]); 
        $request  -> merge(['slug'=>$this->make_slug($request->title)]);

        // repo store data artical
        $data =  $this->modelArticles->store($request);

        // repo store data tags  
        $this->modelArticles->storeTgas($request->tags,$data->id);

        // Log Activity
        \LogActivity::addToLog('Add New Artical'.' : '.$data->title);


        // Message success After Add
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

        // repo Update data tags
        $this->modelArticles->updateTgasArticles($request->tags,$id);

        // Log Activity
        \LogActivity::addToLog('Update Artical'.' : '.$request->title);

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
		  $data = $this->modelArticles->deleteArticalCheck($request->check);

           // Log Activity
           \LogActivity::addToLog('Delete Articals');

		   session()->flash('success','Successfully deleted');
		   return back();
            }else{
		   session()->flash('warning','Please select at least one article');
		   return back();
        } 
    }

}
