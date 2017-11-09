<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Times extends Model {
	use ObservantTrait;
	
    protected $table = 'times';

}
