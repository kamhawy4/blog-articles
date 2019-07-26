<?php

namespace App\Http\Controllers\Api\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentArticle;

use App\Repositories\CommentArticle\CommentArticleRepositories;


class CommentsController extends Controller
{
    
  	// space that we can use the repository From
    protected $modelCommentArticle;    

  	function __construct(CommentArticle $commentArticle)
  	{
  	  $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);
  	}

    // return  Comments by article_id
    public function ShowComments($id)
    {
        $commentArticle = $this->modelCommentArticle->show($id);
        return response()->json(['status'=>true,'code'=>200,'response'=>$commentArticle]);        
    }

    // Store Comments :: return comment details 
	  public function StoreComments(Request $request)
  	{
  	  $this->validate($request,[
  	      'name'   =>'required',
  	      'title'  =>'required',
  	    ]);
         
        // create Comment Article
  	    $commentArticle       =  $this->modelCommentArticle->store($request);
        return response()->json(['status'=>true,'code'=>200,'response'=>$commentArticle]);
  	}

    // Edit Comments :: return comment details 
    public function UpdateComments($id,Request $request)
    {
      $this->validate($request,[
          'name'   =>'required',
          'title'  =>'required',
        ]);
        // create Comment Article
        $commentArticle       =  $this->modelCommentArticle->update($request,$id);
        return response()->json(['status'=>true,'code'=>200,'response'=>$commentArticle]);
    }


    // Delete Comments by id
    public function DeleteComments($id)
    {
      $this->modelCommentArticle->delete($id);
      return response()->json(['status'=>true,'code'=>200]);      
    }

}
