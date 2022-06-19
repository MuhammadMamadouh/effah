<?php

namespace App;

use App\Models\Answer;
use App\Models\City;
use App\Models\College;
use App\Models\Country;
use App\Models\District;
use App\Models\Education;
use App\Models\QuestionAnswerUser;
use App\Models\Religion;
use App\Models\Report;
use App\Models\University;
use App\Models\UserImages;
use App\Models\VerificationCode;
use App\Models\Wallet;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Thomasjohnkane\Snooze\Traits\SnoozeNotifiable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Notifiable, SnoozeNotifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'frName', 'lsName', 'FaName', 'idNumber', 'image', 'is_login', 'gender',
        'is_block', 'is_wait', 'phone_Code', 'phone', 'country_id', 'gov_id',
        'city_id', 'lastLoginAt', 'religion_id', 'password',
        'about_you', 'about_partner', 'district_id', 'education_id', 'universty_id', 'college_id',
        'birth_date', 'points', 'identity_face', 'identity_back', 'passport_image', 'is_approved', 'loved_one',
        'accept_love',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->frName . ' ' . $this->lsName;
    }

    public function universty()
    {
        return $this->belongsTo(University::class, 'universty_id');
    }

    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function images()
    {
        return $this->hasMany(UserImages::class, 'user_id');
    }
    public function wallet()
    {
        return $this->hasMany(Wallet::class, 'user_id');
    }

    public function codes()
    {
        return $this->hasMany(VerificationCode::class, 'user_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'reporter_id');
    }

    public function answers()
    {
        return QuestionAnswerUser::where('user_id', '=', $this->id);
    }
    public function selfanswers()
    {
        return $this->belongsToMany(Answer::class, 'question_answer_users', 'user_id', 'answer_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
