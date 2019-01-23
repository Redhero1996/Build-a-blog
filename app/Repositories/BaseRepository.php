<?php  
namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface{
	 // model property on class instances
	protected $model;

	// Constructor to bind model to repo
	public function __construct(){
		$this->setModel();
	}

	abstract public function getModel();

	public function setModel(){
		$this->model = app()->make(
			$this->getModel()
		);
	}

	// Get all instances of model
	public function all(){
		return $this->model->all();
	}

	// create a new record in the database
	public function create(array $attributes){
		return $this->model->create($attributes);
	}

	// show the record with the given id
	public function show($id){
		return $this->model->findOrFail($id);
	}

	// update record in the database
	public function update(array $attributes, $id){
		$record = $this->find($id);
		return $record->update($attributes);
	}

	// remove record from the database
	public function delete($id){
		return $this->model->destroy($id);
	}

	// find id
	public function find($id){
		return $this->model->find($id);
	}

}
?>