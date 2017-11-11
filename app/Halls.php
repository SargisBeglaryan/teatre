<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Halls extends Model {
	use ObservantTrait;
	
    protected $table = 'halls';

    public function seans()
    {
        return $this->hasMany('App\Index', 'hall_id', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($halls) { // before delete() method call this
             $halls->seans()->delete();
             // do the rest of the cleanup...
        });
    }

}
