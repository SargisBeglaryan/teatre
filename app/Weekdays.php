<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Weekdays extends Model {
	use ObservantTrait;
	
    protected $table = 'weekdays';

    public function seans()
    {
        return $this->belongsTo('App\Index', 'weekday_id', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($weekdays) { // before delete() method call this
             $weekdays->seans()->delete();
             // do the rest of the cleanup...
        });
    }

}
