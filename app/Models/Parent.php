<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    public $table = 'parents';

    public $fillable = ['name'];
    
}
