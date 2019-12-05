<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // table name
    protected $table = 'vehicles';

    // primary key
    protected $primaryKey = 'vehicle_id';

    public function issues()
    {
    	return $this->hasMany('App\Issue','vehicle_id');
    }

}
