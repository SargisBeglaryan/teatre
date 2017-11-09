<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Weekdays extends Model {
	use ObservantTrait;
	
    protected $table = 'weekdays';

}
