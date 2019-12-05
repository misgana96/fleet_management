<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
	// table name
    protected $table = 'drivers';

    // primary key
    protected $primaryKey = 'driver_id';
}
