<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Films extends Model {
	use ObservantTrait;
	
    protected $table = 'films';

}
