<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mangaers,App\Article,App\Subscribe,App\Categories,App\NumberVisitors;
class DashboardController extends Controller
{
    public function index()
    {
        $mangaers       =  Mangaers::count();
        $article        =  Article::count();
        $subscribe      =  Subscribe::count();
        $categories     =  Categories::count();
        $chart          = new NumberVisitors;

    	return view('admin.dashboard.index',compact('mangaers','article','subscribe','categories','chart'));
    }
}
