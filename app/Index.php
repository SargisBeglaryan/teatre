<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Index extends Model {
	use ObservantTrait;
	
    protected $table = 'seans';

    public function weekdays()
    {
        return $this->belongsTo('App\Weekdays', 'weekday_id', 'id');
    }
    public function tickets()
    {
        return $this->hasMany('App\Tickets', 'seans_id', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($seans) { // before delete() method call this
             $seans->tickets()->delete();
             // do the rest of the cleanup...
        });
    }

    public function halls()
    {
        return $this->belongsTo('App\Halls', 'hall_id', 'id');
    }

    public function films()
    {
        return $this->belongsTo('App\Films', 'film_id', 'id');
    }

}
