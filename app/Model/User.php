<?php
namespace App;
namespace App\Model;

class User extends BaseModel {

	protected $dates = ['modifiedAt','createdAt'];
	// public function activity() {
	// 	return $this->hasMany(Activity::class);
	// }
}
