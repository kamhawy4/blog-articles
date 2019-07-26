<?php

namespace App\Http\Controllers\Api\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Mangaers,App\Models\Article,App\Models\Categories;

use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\Managers\ManagersRepositories;
use App\Repositories\Categories\CategoriesRepositories;
use App\Models\ArticleTags;

class DashboardController extends Controller
{

    protected $modelArticles;
    protected $modelCategories;
    protected $modelCommentArticle;

    function __construct(Article $article,Categories $categories,Mangaers $mangaers,ArticleTags $articleTags)
    {
        $this->modelArticles       = new ArticlesRepositories($article,$articleTags);
        $this->modelCategories     = new CategoriesRepositories($categories);
        $this->modelManagers       = new ManagersRepositories($mangaers);
    }

	/**
	  * @return count Mangaers and Article and Categories
	*/
    public function index()
    {
        $article    = $this->modelArticles->count();
        $categories = $this->modelCategories->count();
        $mangaers   = $this->modelManagers->count();
    	return view('admin.dashboard.index',compact('mangaers','article','categories'));
    }
}
