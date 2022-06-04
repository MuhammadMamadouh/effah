<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCity extends Model
{
    protected $table = 'cities_districts';
    public  function gov(){
        return $this->belongsTo('App\Models\City','city_id');
    }

}
