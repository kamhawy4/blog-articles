<?php

namespace App\Repositories\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use Auth;

class SettingsRepositories implements RepositoryInterface
{	
	// model property on class instances
    protected $model;

	function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function all()
	{
    return $this->model->first();
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

}


?>