<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable=[
        'bank_id',
        'user_id',
        'image',
        'amount',
        'number',
        'name',
        'accepted'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
}
