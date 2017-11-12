<?php

namespace App;

namespace App\Model;
use App\Model\User;
use App\Model\Team;

class Notification extends BaseModel {

    protected $collection = 'push_notifications';
    protected $dates = ['created_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function team() {
        return $this->belongsTo(Team::class);
    }

}
