<?php

namespace App\Repositories\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use DB;
use Auth;

class ArticlesRepositories extends Controller implements RepositoryInterface  
{	
	// model property on class instances
    protected $model;
    protected $articleTags;
    protected $articles;

  	function __construct(Model $model,Model $articleTags,Model $articles)
  	{
      $this->articles     = $articles;
      $this->model        = $model;
  		$this->articleTags  = $articleTags;
  	}

  	public function all()
  	{
         return $this->articles->all();
  	}

    public function pagination($count)
    {   
       return $this->articles->paginate($count);
    }

    public function store($data)
    {

     $articles =  $this->articles->create($data->all());

     $languages = Config::get('languages.supported');
      for ($i=0; $i < count($languages) ; $i++){
        $data    -> merge(['language'=>$languages[$i]]);
        $data    -> merge(['articles_id'=>$articles->id]);
        $data    -> merge(['title'=>$data->input('title')]);
        $data    -> merge(['description'=>$data->input('description')]);
        $data    -> merge(['slug'=>$this->make_slug($data->input('title'))]);
        $this->model->create($data->all());        
      }

      return  $articles;

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

      $languages = Config::get('languages.supported');
      for ($i=0; $i < count($languages) ; $i++){
        $data    -> merge(['title'=>$data->input($languages[$i].'_title')]);
        $data    -> merge(['description'=>$data->input($languages[$i].'_description')]);
        $data    -> merge(['slug'=>$this->make_slug($data->input($languages[$i].'_title'))]);
        $update->translation($languages[$i])->first()->update($data->all());        
        $update->update($data->all());        
      }
      return;
    }

    public function updateTgasArticles($tags_id,$article_id)
    {
      $article = $this->articles->findOrFail($article_id);
      $article->GetTags()->sync($tags_id);
    }

    public function show($id)
    {
      return  $this->articles->findOrFail($id);
    }

    public function delete($id)
    {
      $delete = $this->articles->findOrFail($id);
      return $delete->delete();
    }

    public function deleteArticalCheck($data)
    {
		 return $this->articles->destroy($data);        
    }

    public function count()
    {
        return $this->articles->count();
    }

    public function orderByDesc($coleman)
    {

        return $this->articles->orderBy('created_at',$coleman);
    }

    public function whereSlug($article)
    {
      return $this->articles->where('id',$article->articles_id)->first();
    }

    public function ArticleWhereCategorieId($categorieId)
    {
        return $this->articles->where('id',$categorieId);
    }

    public function ArticleWhereTagId($tagId)
    {
      $tags = $this->articleTags->where('tag_id',$tagId)->get();
      $allTagsId = [];
      foreach ($tags as $tag) {
        $allTagsId[] = $tag->article_id;
      }
      return $this->articles->whereIn('id',$allTagsId)->paginate(10);
    }
    
}


?>