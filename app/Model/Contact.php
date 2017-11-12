<?php
namespace App;
namespace App\Model;

class Contact extends BaseModel {
    protected $collection = 'contact';
	protected $dates = ['modifiedAt','createdAt'];
}
