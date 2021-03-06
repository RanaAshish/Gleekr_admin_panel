<?php

namespace App;

namespace App\Model;

class Activity extends BaseModel {

	protected $collection = 'activities';
    protected $dates = ['created_at', 'endDate', 'startDate', 'startTime'];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
