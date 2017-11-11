<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Films extends Model {
	use ObservantTrait;
	
    protected $table = 'films';

    public function seans()
    {
        return $this->hasMany('App\Index', 'film_id', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($films) { // before delete() method call this
             $films->seans()->delete();
             // do the rest of the cleanup...
        });
    }

}
