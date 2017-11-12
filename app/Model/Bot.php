<?php
namespace App;
namespace App\Model;

class Bot extends BaseModel {
    protected $collection = 'bot';
	protected $dates = ['modifiedAt','createdAt'];
}
