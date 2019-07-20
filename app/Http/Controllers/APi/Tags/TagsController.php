<?php

namespace App\Http\Controllers\Api\Tags;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Tags;
use App\Repositories\Tags\TagsRepositories;

use Validator;

class TagsController extends Controller
{
    protected $modelTags;

	public function __construct(Tags $tags)
	{
		$this->modelTags       = new TagsRepositories($tags);	   
	}

   // Return All tags
    public function index()
    {
      $tags =  $this->modelTags->all();	  
      return response()->json(['status'=>true,'code'=>200,'response'=>$tags]);      
    }

}
