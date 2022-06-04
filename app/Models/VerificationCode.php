<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    //
    public $table = 'users_verfication_code';
    protected $fillable = ['user_id', 'code'];
}
