<?php
namespace App;
namespace App\Model;

class Otp extends BaseModel {
         protected $collection = 'otp';

	protected $dates = ['modifiedAt','createdAt'];
	// public function activity() {
	// 	return $this->hasMany(Activity::class);
	// }
}
