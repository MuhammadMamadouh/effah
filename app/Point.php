<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public $table = 'points';
    protected $fillable = ['name', 'points'];
}
