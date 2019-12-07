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
use App\Models\Categories,App\Models\ArticleTranslation,App\Models\CommentArticle,App\Models\Tags,App\Models\ArticleTags,App\Models\CategoriesTranslations;
use Storage,Session,Image,Auth,DB,File;
use App\Models\Articles;
use DataTables;

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
    

    function __construct(ArticleTranslation $articleTranslation,Tags $tags,Categories $categories,CommentArticle $commentArticle,ArticleTags $articleTags,Articles $articles,CategoriesTranslations $categoriesTranslations){
      $this->modelArticles       = new ArticlesRepositories($articleTranslation,$articleTags,$articles);
      $this->modelCategories     = new CategoriesRepositories($categoriesTranslations,$categories);
      $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);
      $this->modelTags           = new TagsRepositories($articleTranslation,$tags);

      $this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index','store']]);
      $this->middleware('permission:article-create', ['only' => ['create','store']]);
      $this->middleware('permission:article-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:article-delete', ['only' => ['destroy']]);
    }

  // Return view page index articles And Return All Articles by Datatables
    public function index(Request $request)
    {
      if ($request->ajax()) {
            $articles = $this->modelArticles->all();
            return Datatables::of($articles)
                ->editColumn('check', function($article){
                   $check = '<td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input  type="checkbox"  name="check[]  class="checkboxes" value="'.$article->id.'" /><span></span></label></td>';
                   return $check;
                })
                ->editColumn('title', function($article){
                   return $article->translation('en')->first()->title;
                })
                ->editColumn('name', function($article){
                   return $article->GetNameCategorie->translation('en')->first()->name;
                })
                ->editColumn('image', function($article){
                    $explodeImg =  explode(".",$article->image);
                    $pathImg    =  $article->image;

                   if($article->image != '' && $explodeImg[0] == 'http://lorempixel'){
                     $image = '<td class="info product-block"><img src='.$pathImg.' width="100" style="border:1px solid #c4c4c4" height="70"></td>';
                     return $image;
                    }else{
                      $image = '<td class="info"><img src="'.self::PATH.'/'.$article->image.'" width="100" style="border:1px solid #c4c4c4" height="70"></td>';
                      return $image;
                    }
                })
               ->editColumn('comments', function($article){
                    $comments = '<div class="col-md-4"><a class=" btn btn-info" href="/dashboard/article/comments/'.$article->id.'" >Comments</a></div>';
                    return $comments;
              })
               ->editColumn('edit', function($article){
                   $edit = '<div class="col-md-4">
                              <a  href="/dashboard/articles/'.$article->id.'/edit"><li class="btn btn-primary">Edit</li></a>
                           </div>';
                  return $edit;
              })
              ->rawColumns(['comments','image','check','edit'])
              ->make(true);
        }      
      return view('admin.articles.index');
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

          //Merge Author
          $request  -> merge(['author'=>Auth::user()->name]);

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
