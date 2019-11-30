<?php

namespace App\Repositories\Categories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface;

class CategoriesRepositories  extends Controller implements RepositoryInterface
{	
	// model property on class instances
    protected $model;
    protected $categoriesTranslations;

	function __construct(Model $categoriesTranslations,Model $model)
	{
    $this->model = $model;
		$this->categoriesTranslations = $categoriesTranslations;
	}

	public function all()
	{
       return $this->model->all();
	}

    public function store($data)
    {
      $categories = $this->model->create();

      $languages = Config::get('languages.supported');
      for ($i=0; $i < count($languages) ; $i++){
        $data    -> merge(['language'=>$languages[$i]]);
        $data    -> merge(['categories_id'=>$categories->id]);
        $data    -> merge(['name'=>$data->input('name')]);
        $data    -> merge(['slug'=>$this->make_slug($data->input('name'))]);
        $this->categoriesTranslations->create($data->all());        
      }

      return  $categories;
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

    public function deleteCategoriesCheck($data)
    {
	   return $this->model->destroy($data);        
    }

    public function show($id)
    {
     return $this->model->findOrFail($id);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function whereSlug($slug)
    {
        return $this->model->where('slug',$slug)->first();
    }

    public function orderByDesc($coleman)
    {
        return $this->model->orderBy('created_at',$coleman);
    }

}


?>