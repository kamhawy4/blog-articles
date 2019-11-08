<?php

namespace App\Repositories\Users;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use Auth;
use DB;
class UsersRepositories implements RepositoryInterface
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
    $user = $this->model->create($data->all());
    return $user->assignRole($data->input('roles'));
  }

  public function update($data,$id)
  {
    $update = $this->show($id);
    $update->update($data->all());
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    return $update->assignRole($data->input('roles'));
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

  public function deleteUsersCheck($data)
  {
    return $this->model->destroy($data);        
  }

}


?>