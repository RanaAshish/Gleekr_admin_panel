<?php
	namespace App\Model;
	use Moloquent\Eloquent\Model as Eloquent;
	class BaseModel extends Eloquent {
		protected $connection = 'mongodb';
	}	
?>