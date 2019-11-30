<?php

namespace App\Repositories\Tags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface;

class TagsRepositories   extends Controller  implements RepositoryInterface
{	
	// model property on class instances
    protected $model;
    protected $tagsTranslations;

	function __construct(Model $tagsTranslations,Model $model)
	{    
    $this->model = $model;
		$this->tagsTranslations = $tagsTranslations;
	}

	public function all()
	{
       return $this->model->all();
	}

    public function store($data)
    {
        $tags = $this->model->create();

        $languages = Config::get('languages.supported');
        for ($i=0; $i < count($languages) ; $i++){
          $data    -> merge(['language'=>$languages[$i]]);
          $data    -> merge(['tags_id'=>$tags->id]);
          $data    -> merge(['name'=>$data->input('name')]);
          $data    -> merge(['slug'=>$this->make_slug($data->input('name'))]);
          $this->tagsTranslations->create($data->all());        
        }
        
      return  $tags;
    }

    public function update($data,$id){
      $update = $this->show($id);

      $languages = Config::get('languages.supported');
      for ($i=0; $i < count($languages) ; $i++){
        $data    -> merge(['name'=>$data->input($languages[$i].'_name')]);
        $data    -> merge(['slug'=>$this->make_slug($data->input($languages[$i].'_name'))]);
        $update->translation($languages[$i])->first()->update($data->all());        
        $update->update();        
      }
      return $update;

    }

    public function delete($id)
    {
      $delete = $this->model->findOrFail($id);
      return $delete->delete();
    }

    public function deleteTagsCheck($data)
    {
	   return $this->model->destroy($data);        
    }

    public function show($id)
    {
     return $this->model->findOrFail($id);
    }


}


?>