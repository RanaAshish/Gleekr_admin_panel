<?php
namespace App;
namespace App\Model;

class Group extends BaseModel {

 	protected $collection = 'group';
	protected $dates = ['modifiedAt','createdAt'];
}
