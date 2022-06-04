<?php

namespace App\Http\Middleware;

use App\Models\VerificationCode;
use Closure;

class VerifyCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $code = $request->code;
        $user_id = $request->user_id;
        $verification_code = VerificationCode::where('code', $code)->where('user_id', $user_id)->first();
        if ($verification_code) {
            if ($verification_code->is_used == 0) {
                $verification_code->is_used = 1;
                $verification_code->save();
                return $next($request);
            } else {
                return response()->json([
                    'message' =>  ' كود التحقق مستخدم من قبل',
                    'error' => 401,
                ]);
            }
        }
        return $next($request);
    }
}
