<?php

namespace App\Repositories\Categories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;

class CategoriesRepositories implements RepositoryInterface
{	
	// model property on class instances
    protected $model;

	function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function all()
	{
       return $this->model->all();
	}

    public function store($data)
    {
        return $this->model->create($data->all());
    }

    public function update($data,$id){
      $update = $this->show($id);
      $update->update($data->all());
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