<?php  
namespace App\Repositories;

interface RepositoryInterface{
	
	public function all();

	public function create(array $attributes);

	public function update(array $attributes, $id);

	public function show($id);

	public function delete($id);

	public function find($id);

}

?>