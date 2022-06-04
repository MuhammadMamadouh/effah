<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public $table = 'answers';

    protected $fillable = ['id', 'content', 'info', 'is_active', 'type', 'qu_id'];

  public function question(){
      return $this->belongsTo('App\Models\Question','qu_id');
  }
}
