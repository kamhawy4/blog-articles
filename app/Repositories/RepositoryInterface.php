<?php 
namespace App\Repositories;

interface RepositoryInterface
{
    public function all();
    
    public function store($data);

    public function update($data, $id);

    public function delete($id);

    public function show($id);

}