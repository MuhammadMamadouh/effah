<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $table = 'wallets';

    protected $fillable = ['user_id', 'balance'];
}