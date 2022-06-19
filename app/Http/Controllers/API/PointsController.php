<?php

namespace App\Http\Controllers\API;

use App\Constants\Gender;
use App\Http\Controllers\Controller;
use App\Http\Resources\IndexUsersResource;
use App\Http\Resources\UserResource;
use App\Models\QuestionAnswerUser;
use App\Notifications\RefuseLoveNotifiction;
use App\Notifications\SendLoveNotifiction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointsController extends Controller
{
    public function myPoints(){
        return Auth::user()->points;
    }

    public function getPoints() {
        Auth::user()->points  += 40;
        Auth::user()->save();
        return Auth::user()->points;
    }

}
