<?php

namespace App\Model;

use Moloquent\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $connection = 'mongodb';

}
