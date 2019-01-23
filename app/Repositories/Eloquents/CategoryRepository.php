<?php  
namespace App\Repositories\Eloquents;

use App\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

/**
* 
*/
class CategoryRepository implements CategoryRepositoryInterface
{
	
	public function all(){
		return Category::all();
	}
	public function find($id){
		return Category::find($id);
	}
}
?>