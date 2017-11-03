<?php
namespace App;
namespace App\Model;

class Activity extends BaseModel
{
	protected $dates = ['created_at', 'endDate', 'startDate', 'startTime'];
	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
