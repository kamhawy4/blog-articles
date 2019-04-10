<?php

namespace App\Repositories\Managers;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use Auth;
class ManagersRepositories implements RepositoryInterface
{	
	// model property on class instances
    protected $model;

	function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function all()
	{
    return $this->model->where('id','!=',Auth::guard('managers')->user()->id)->get();
	}

  public function store($data)
  {
    return $this->model->create($data->all());
  }

  public function update($data,$id)
  {
    $update = $this->show($id);
    return $update->update($data->all());
  }

  public function delete($id)
  {
    $delete = $this->model->findOrFail($id);
    return $delete->delete();
  }

  public function show($id)
  {
    return $this->model->findOrFail($id);
  }

  public function count()
  {
    return $this->model->count();
  }

  public function deleteMangaersCheck($data)
  {
    return $this->model->destroy($data);        
  }

}


?>