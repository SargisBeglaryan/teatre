<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Weekdays extends Model {
	use ObservantTrait;
	
    protected $table = 'weekdays';

    protected static function boot() {
        parent::boot();

        public function seans()
	    {
	        return $this->belongsTo('App\Index', 'weekday_id', 'id');
	    }

        static::deleting(function($weekdays) { // before delete() method call this
             $weekdays->seans()->delete();
             // do the rest of the cleanup...
        });
    }

}
