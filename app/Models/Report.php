<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $table = 'reports';

    protected $fillable = ['reporter_id', 'reported_id', 'content', 'reply', 'reply_at'];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function reported()
    {
        return $this->belongsTo(User::class, 'reported_id');
    }

}
