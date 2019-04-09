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

    public function store(array $data)
    {
       return $this->model->get();
    }

    public function update(array $data, $id){

    }

    public function delete($id){

    }

    public function show($id){
    }


}


?>