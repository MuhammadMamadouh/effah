<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public $table = 'relationships';
    protected $fillable = [
        'male_id',
        'female_id',
        'type',
        'viewed',
        'viewed_at',
        'accept',
        'accept_at',
        'request_sent',
        'req_sent_at'
    ];
}
