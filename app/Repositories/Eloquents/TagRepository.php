<?php  
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TagRepositoryInterface;
use App\Repositories\BaseRepository;

/**
* 
*/
class TagRepository extends BaseRepository implements TagRepositoryInterface
{
	
	public function getModel(){
		return \App\Tag::class;
	}
}
?>