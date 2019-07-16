<?php

namespace App\Repositories\Tags;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;

class TagsRepositories implements RepositoryInterface
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