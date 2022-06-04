<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'logo','login_banner','image_slider','en_title','ar_title','address1','address2','phone1','phone2','fax','email1','email2','link','ar_des','en_des',
        'latitude','longitude','sms_user_name',
        'sms_user_pass','sms_sender','publisher','company_hot_line','android_app','ios_app','site_proportion','default_language'
    ];
}
