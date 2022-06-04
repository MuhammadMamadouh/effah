<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'from_id', 'to_id','notification_type','order_id','notification_date','action_type','status','is_read','notification_name','is_deleted'
    ];
}
