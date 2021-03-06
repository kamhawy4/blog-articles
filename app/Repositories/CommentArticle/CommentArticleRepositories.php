<?php

namespace App\Repositories\CommentArticle;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use Auth;
use DB;

class CommentArticleRepositories implements RepositoryInterface
{	

	// model property on class instances
    protected $model;

	function __construct(Model $model)
	{            
		$this->model = $model;
	}

    public function show($id)
    {
       return $this->model->where('article_id',$id)->get();
    }

    public function delete($id){        
        $delete = $this->model->findOrFail($id);
        return $delete->delete();
    }

    public function store($data)
    {
        return $this->model->create($data->all());
    }
    
    public function all(){}


    public function update($data,$id)
    {
        DB::table('comment_articles')->where('id', $id)->update(['title' => $data->title,'name' => $data->name]);
        return  $this->model->findOrFail($id);     
    }

}


?>