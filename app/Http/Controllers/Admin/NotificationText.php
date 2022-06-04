<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationText extends Model
{
    protected $table = 'notification_texts';

    protected $fillable = [
        'ar_title', 'en_title','ar_content','en_content'
    ];
}
