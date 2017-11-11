<?php
namespace App;
namespace App\Model;

class Contact extends BaseModel {
         protected $collection = 'Contact';

	protected $dates = ['modifiedAt','createdAt'];
	// public function activity() {
	// 	return $this->hasMany(Activity::class);
	// }
}
