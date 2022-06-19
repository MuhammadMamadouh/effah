<?php

namespace App\Http\Controllers\API;

use App\Constants\Gender;
use App\Constants\Points;
use App\Http\Controllers\Controller;
use App\Http\Resources\IndexUsersResource;
use App\Http\Resources\UserResource;
use App\Models\QuestionAnswerUser;
use App\Notifications\RefuseLoveNotifiction;
use App\Notifications\SendLoveNotifiction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::user()->gender == Gender::MALE) {

            $general_users = User::where('gender', '=', Gender::FEMALE)
                ->where('city_id', Auth::user()->city_id)
                ->where('country_id', Auth::user()->country_id)
                ->where('religion_id', Auth::user()->religion_id)
                ->where('education_id', Auth::user()->education_id)
                ->where('loved_one', null)
                ->where('is_approved', true)
                ->pluck('id');

            // dd($general_users);
            $answers = QuestionAnswerUser::where('user_id', '=', Auth::user()->id)->pluck('answer_id');

            $user_answers = QuestionAnswerUser::whereIn('answer_id', $answers)->whereIn('user_id', $general_users)->get()->groupBy('user_id')
                ->map(function ($item, $key) {
                    return User::find($key);
                });

            // dd(IndexUsersResource::collection($user_answers));
            return IndexUsersResource::collection($user_answers);
        } elseif (Auth::user()->gender == Gender::FEMALE) {
            if (Auth::user()->loved_one != null) {
                return new UserResource(User::findOrFail(Auth::user()->loved_one));
            }
            return response()->json('يرجى الانتظار حتى يتم تقديم طلبك للحصول على الصديق');
        }
    }

    public function filter(Request $request){
        if (Auth::user()->points >= Points::FILTER_WEEK) {
            $users = User::where('')->get();
        }else{
            return response()->json('not enough points');
        }
    }
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }
    public function sendLove($id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            if ($user->id != Auth::user()->id && Auth::user()->loved_one == null && $user->loved_one == null && $user->gender == Gender::FEMALE) {
                $user->loved_one = Auth::user()->id;
                $user->save();

                Auth::user()->loved_one = $user->id;
                Auth::user()->save();
                $user->notify(new SendLoveNotifiction(Auth::user()));
                return response()->json('تم ارسال الطلب بنجاح');

            }
            DB::commit();
            return response()->json('حدث خطأ أثناء العملية');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('حدث خطأ أثناء العملية');
        }
    }

    public function acceptLove($id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            if ($user->id != Auth::user()->id && Auth::user()->loved_one == $user->id && $user->loved_one == Auth::user()->id && !$user->accept_love) {
                $user->accept_love = true;
                $user->save();
                Auth::user()->accept_love = true;
                Auth::user()->save();
                $user->notify(new SendLoveNotifiction(Auth::user()));
                return response()->json('تم قبول الطلب بنجاح');
            }
            DB::commit();
            return response()->json('حدث خطأ أثناء العملية');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('حدث خطأ أثناء العملية');
        }

    }
    public function refuseLove($id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            if ($user->id != Auth::user()->id && Auth::user()->loved_one == $user->id && $user->loved_one == Auth::user()->id && !$user->accept_love) {
                $user->loved_one = null;
                $user->save();
                Auth::user()->loved_one = null;
                Auth::user()->save();
                $user->notify(new RefuseLoveNotifiction($user));
                return response()->json('تم رفض الطلب ');
            }
            DB::commit();
            return response()->json('حدث خطأ أثناء العملية');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('حدث خطأ أثناء العملية');
        }
    }
    public function showParentInfo($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->points >= Points::PARENT_INFO) {
                if (Auth::user()->loved_one == $user->id && $user->loved_one == Auth::user()->id && $user->accept_love == true) {
                    return response()->json([
                        'parent_name' => $user->parent_name,
                        'parent_phone' => $user->parent_phone,
                        'relative_degree' => $user->relative_degree,
                        'avaliable_time' => $user->avaliable_time,
                    ]);
                }

            return response()->json('حدث خطأ أثناء العملية');
            }else {
                return response()->json('ليس لديك عدد كاف من النقاط .. برجاء شراء النقاط لمواصلة العملية');
            }

        } catch (\Exception $e) {
            return response()->json('حدث خطأ أثناء العملية');
        }
    }
}
