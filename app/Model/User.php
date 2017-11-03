<?php
namespace App;
namespace App\Model;

class User extends BaseModel {

	public function activities() {
		return $this->hasMany(Activity :: class);
	}
}
