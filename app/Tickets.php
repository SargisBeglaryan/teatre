<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Tickets extends Model {
	use ObservantTrait;
	
    protected $table = 'tickets';

    public function seans()
    {
        return $this->belongsTo('App\Index', 'seans_id', 'id');
    }

}