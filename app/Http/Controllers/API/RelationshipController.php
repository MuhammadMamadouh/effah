<?php

namespace App\Http\Controllers\API;

use App\Constants\Gender;
use App\Constants\Points;
use App\Http\Controllers\Controller;
use App\Models\Relationship;
use App\Notifications\AcceptLoveNotification;
use App\Notifications\RefuseLoveNotifiction;
use App\Notifications\SendLoveNotifiction;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelationshipController extends Controller
{

    public function sendLove($id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user_relationship = Relationship::where('male_id', '=', Auth::user()->id)->where('type', 'like')->first();
            if ($user_relationship) {
                return response()->json('هذا المستخدم في علاقة بالفعل');
            } else {
                if ($user->id != Auth::user()->id && $user->gender == Gender::FEMALE) {
                    Relationship::create([
                        'male_id' => Auth::user()->id,
                        'female_id' => $user->id,
                        'type' => 'like',
                    ]);
                    $user->notify(new SendLoveNotifiction(Auth::user()));
                    DB::commit();
                    return response()->json('تم ارسال الطلب بنجاح');
                }
            }
            return response()->json('حدث خطأ أثناء العملية');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('حدث خطأ أثناء العملية');
        }
    }

    public function viewRequestLove()
    {
        $user_relationship = Relationship::where('female_id', Auth::user()->id)->where('viewed', false)->first();
        if ($user_relationship) {
            //
            $user_relationship->update([
                'view' => true,
                'viewed_at' => Carbon::now(),
            ]);
            return response()->json('فكر في الأمر جيدا .. تنبيه: لا يحق الموافقة أو الرفض إلا بمرور دقيقة ونصف من الآن');
        } else {
            return response()->json('حدث خطأ أثناء العملية');
        }
    }
    public function acceptLove($id)
    {

        $user = User::findOrFail($id);
        $user_relationship = Relationship::where('female_id', Auth::user()->id)
            ->where('male_id', $user->id)
            ->where('viewed', true)
            ->first();

        if ($user_relationship) {
            // calculate if viewed_at time has gone from 90 secondes
            $time = Carbon::now()->diffInSeconds($user_relationship->viewed_at);
            if ($time < 90) {
                return response()->json('لا يحق الموافقة أو الرفض إلا بمرور دقيقة ونصف من الآن');
            } else {
                $user_relationship->update([
                    'accept' => true,
                    'accept_at' => Carbon::now(),
                ]);
                $user->notify(new AcceptLoveNotification(Auth::user()));
                return response()->json('تمت الموافقة على الطلب');
            }
        } else {
            return response()->json('حدث خطأ أثناء العملية');
        }
    }
    public function refuseLove($id)
    {

        // find user who send love request
        $user = User::findOrFail($id);

        //check if there is already a love request and viewed by female auth
        $user_relationship = Relationship::where('female_id', Auth::user()->id)
            ->where('male_id', $user->id)
            ->where('type', 'like')
            ->where('viewed', true)
            ->first();

        if ($user_relationship) { // relationship exists

            // check if user accept this request before and want to cancel it
            if ($user_relationship->accept == true) {

                // calculate if viewed_at time has gone from 36 hours
                $time_from_acceptance = Carbon::now()->diffInHours($user_relationship->accept_at);
                if ($time_from_acceptance < 36) {
                    return response()->json('لا يحق لك إلغاء الطلب إلا بعد مرور 36 ساعة');
                }

                $user_relationship->update([
                    'type' => 'dislike',
                    'accept' => false,
                    'accept_at' => Carbon::now(),
                ]);
                return response()->json('تم إلغاء الطلب');
                $user->notify(new RefuseLoveNotifiction(Auth::user()));
            }
            return response()->json('تمت الموافقة على الطلب');
        } else {
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
            } else {
                return response()->json('ليس لديك عدد كاف من النقاط .. برجاء شراء النقاط لمواصلة العملية');
            }

        } catch (\Exception $e) {
            return response()->json('حدث خطأ أثناء العملية');
        }
    }
}
