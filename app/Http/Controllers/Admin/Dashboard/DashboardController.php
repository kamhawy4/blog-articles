<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mangaers,App\Models\ArticleTranslation,App\Models\Categories;
use App\Repositories\Articles\ArticlesRepositories;
use App\Repositories\Managers\ManagersRepositories;
use App\Repositories\Categories\CategoriesRepositories;
use App\Models\ArticleTags;
use App\Charts\UsersChart;
use App\Charts\ArticlesChart;
use App\Models\User;
use App\Models\Articles;


class DashboardController extends Controller
{
    protected $modelArticles;
    protected $modelCategories;
    protected $modelCommentArticle;

    function __construct(ArticleTranslation $articleTranslation,Categories $categories,Mangaers $mangaers,ArticleTags $articleTags,Articles $articles){
        $this->modelArticles       = new ArticlesRepositories($articleTranslation,$articleTags,$articles);
        $this->modelCategories     = new CategoriesRepositories($categories);
        $this->modelManagers       = new ManagersRepositories($mangaers);
    }

	/**
	  * @return count Mangaers and Article and Categories
	*/
    public function index()
    {
        // Chart User
        $today_users      = User::whereDate('created_at', today())->count();
        $yesterday_users  = User::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago = User::whereDate('created_at', today()->subDays(2))->count();
        $chart            = new UsersChart;
        $chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $chart->dataset('Users', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);


        //Chart Articles
        $today_article      = ArticleTranslation::whereDate('created_at', today())->count();
        $yesterday_article  = ArticleTranslation::whereDate('created_at', today()->subDays(1))->count();
        $article_2_days_ago = ArticleTranslation::whereDate('created_at', today()->subDays(2))->count();
        $articlesChart      = new ArticlesChart;
        $articlesChart->labels(['2 days ago', 'Yesterday', 'Today']);
        $articlesChart->dataset('Article', 'bar', [$article_2_days_ago, $yesterday_article, $today_article]);


        // data 
        $article    = $this->modelArticles->count();
        $categories = $this->modelCategories->count();
        $mangaers   = $this->modelManagers->count();
    	return view('admin.dashboard.index',compact('mangaers','article','categories','chart','articlesChart'));
    }
}
