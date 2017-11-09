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

}
