<?php
namespace App;
namespace App\Model;

class User extends BaseModel {

	protected $dates = ['created_at','createdAt'];
	// public function activity() {
	// 	return $this->hasMany(Activity::class);
	// }
}
