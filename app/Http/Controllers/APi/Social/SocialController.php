<?php

namespace App\Http\Controllers\Api\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\SocialLinks;
use App\Repositories\Social\SocialRepositories;

class SocialController extends Controller
{

  protected $modelSocialLinks;

	public function __construct(SocialLinks $socialLinks)
	{
		$this->modelSocialLinks   = new SocialRepositories($socialLinks);	   
	}

   // Return All SocialLinks
    public function index()
    {
      $social =  $this->modelSocialLinks->all();	  
      return response()->json(['status'=>true,'code'=>200,'response'=>$social]);
    }

}
