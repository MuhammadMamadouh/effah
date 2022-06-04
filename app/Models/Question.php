<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'questions';

    protected $fillable = ['id', 'content', 'is_active', 'gender', 'religion', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'qu_id');
    }


}
