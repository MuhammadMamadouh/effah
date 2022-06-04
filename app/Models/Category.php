<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $fillable = ['id', 'name'];

    public function questions(){
        return $this->hasMany(Question::class, 'category_id');
    }
    public function questions_by_gender(){
        return $this->hasMany(Question::class, 'category_id')
        // ->where('gender', '=', auth()->user()->gender)
        ;
    }
}
