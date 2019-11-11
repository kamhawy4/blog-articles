<?php

namespace App\Http\Controllers\Admin\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentArticle;

use App\Repositories\CommentArticle\CommentArticleRepositories;


class CommentsController extends Controller
{
    
	// space that we can use the repository From
    protected $modelCommentArticle;    

	function __construct(CommentArticle $commentArticle){
	  $this->modelCommentArticle = new CommentArticleRepositories($commentArticle);

	  $this->middleware('permission:comment-list|comment-delete', ['only' => ['index','store']]);
	  $this->middleware('permission:comment-delete', ['only' => ['destroy']]);
	}

    // return  Comments by article_id
	public function CommentsArticle($id)
	{
      $commentArticles = $this->modelCommentArticle->show($id);
	  return view('admin.articles.comments',compact('commentArticles'));
	}
   
    // Delete Comments by id
	public function DeleteComments($id)
	{
		$this->modelCommentArticle->delete($id);
		session()->flash('success','Successfully deleted');
		return back();
	}
}
