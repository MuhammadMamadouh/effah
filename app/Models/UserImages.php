<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
    public $table = 'user_images';

    protected $fillable = ['image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
