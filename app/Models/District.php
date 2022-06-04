<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    public $table = 'cities_districts';

    protected $fillable = ['name'];
}
