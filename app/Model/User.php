<?php
namespace App;
namespace App\Model;

class User extends BaseModel {
	protected $collection = 'users';
	protected $dates = ['modifiedAt','createdAt'];
}
