<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    // table name
    protected $table = 'issues';

    // primary key
    protected $primaryKey = 'issue_id';

    //
     public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}