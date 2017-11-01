<?php

namespace App;

use Moloquent\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $connection = 'mongodb';

}
