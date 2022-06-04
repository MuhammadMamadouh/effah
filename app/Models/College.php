<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
   public  function universty(){
       return $this->belongsTo('App\Models\University','un_id');
   }
}
