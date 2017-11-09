<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Index extends Model {
	use ObservantTrait;
	
    protected $table = 'seans';

    public function times()
    {
        return $this->belongsTo('App\Times', 'times_id', 'id');
    }

    public function weekdays()
    {
        return $this->belongsTo('App\Weekdays', 'weekday_id', 'id');
    }

    public function halls()
    {
        return $this->belongsTo('App\Halls', 'halls_id', 'id');
    }

    public function films()
    {
        return $this->belongsTo('App\Films', 'films_id', 'id');
    }

}
