<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswerUser extends Model
{

    protected $fillable = ['type',	'is_active',	'content',	'user_id',	'answer_id',	'qu_id', 'category_id'];
    public function question(){
        return $this->belongsTo(Question::class , 'qu_id');
    }

    public function answer(){
        return $this->belongsTo(Answer::class , 'answer_id');
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
