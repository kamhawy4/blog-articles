<?php

namespace App\Repositories\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use Auth;

class ArticlesRepositories implements RepositoryInterface
{	
	// model property on class instances
    protected $model;
    protected $articleTags;

  	function __construct(Model $model,Model $articleTags)
  	{
      $this->model        = $model;
  		$this->articleTags  = $articleTags;
  	}

  	public function all()
  	{
         return $this->model->all();
  	}

    public function pagination($count)
    {   
       return $this->model->paginate($count);
    }

    public function store($data)
    {
        return $this->model->create($data->all());
    }

    public function storeTgas($tags_id,$article_id)
    {
        foreach($tags_id as $tag_id) {
          $this->articleTags->create(['tag_id'=>$tag_id,'article_id'=>$article_id]);
        }
        return;
    }

    public function whereTagsArticalId($id)
    {
       $tagsArticle = $this->articleTags->where('article_id',$id)->get(); 
       $arrayArtical = [];
       foreach ($tagsArticle as  $tagArticle) {
         $arrayArtical[] = $tagArticle->tag_id;
       }
       return $arrayArtical;
    }

    public function update($data,$id)
    {
      $update = $this->show($id);
      $update->update($data->all());
    }

    public function updateTgasArticles($tags_id,$article_id)
    {
      $article = $this->model->findOrFail($article_id);
      $article->GetTags()->sync($tags_id);
    }

    public function show($id)
    {
      return  $this->model->findOrFail($id);
    }

    public function delete($id)
    {
      $delete = $this->model->findOrFail($id);
      return $delete->delete();
    }

    public function deleteArticalCheck($data)
    {
		 return $this->model->destroy($data);        
    }

    public function count()
    {
        return $this->model->count();
    }

    public function orderByDesc($coleman)
    {
        return $this->model->orderBy('created_at',$coleman);
    }

    public function whereSlug($slug)
    {
        return $this->model->where('slug',$slug)->first();
    }

    public function ArticleWhereCategorieId($categorieId)
    {
        return $this->model->where('categorie_id',$categorieId);
    }

    public function ArticleWhereTagId($tagId)
    {
      $tags = $this->articleTags->where('tag_id',$tagId)->get();
      $allTagsId = [];
      foreach ($tags as $tag) {
        $allTagsId[] = $tag->article_id;
      }
      return $this->model->whereIn('id',$allTagsId)->paginate(10);
    }
    
}


?>