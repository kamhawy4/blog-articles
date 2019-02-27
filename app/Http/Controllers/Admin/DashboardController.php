<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Mangaers,App\Models\Article,App\Models\Categories;

class DashboardController extends Controller
{
	/**
	* @return count Mangaers and Article and Categories
	*/
    public function index()
    {
        $mangaers       =  Mangaers::count();
        $article        =  Article::count();
        $categories     =  Categories::count();
    	return view('admin.dashboard.index',compact('mangaers','article','categories'));
    }
}
