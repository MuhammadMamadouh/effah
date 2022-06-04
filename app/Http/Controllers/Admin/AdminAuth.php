<?php


namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Order;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Mail\AdminResetPassword;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use Mail;

class AdminAuth extends Controller {
    //

    public function login() {
        return view('admin.login',['title'=>'خول المشرفين']);
    }

    public function dologin(Request $request) {


        $rememberme = request('rememberme') == 1?true:false;
        if (admin()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            toastr()->success('تم تسجيل الدخول بنجاح');


            return redirect(url('admin/choseCountry'));
        }
        elseif  (admin()->attempt(['phone' => request('email'), 'password' => request('password')], $rememberme)) {
            toastr()->success('تم تسجيل الدخول بتجاح', 'تم');
        }
        elseif  (admin()->attempt(['name' => request('email'), 'password' => request('password')], $rememberme)) {
            toastr()->success('تم تسجيل الدخول بتجاح', 'تم');
        } else {

/*            toastr()->error('اسم المستخدم او كلمه السر  غير صحيحه');*/
          return redirect()->back()->withErrors(['اسم المستخدم او كلمه السر  غير صحيحه']);
        }
    }

	public function logout() {
		auth()->guard('admin')->logout();
		return redirect(url('admin/login'));
	}

	public function forgot_password() {
		return view('admin.admins.forgot_password');
	}

	public function forgot_password_post() {
		$admin = Admin::where('email', request('email'))->first();
		if (!empty($admin)) {
			$token = app('auth.password.broker')->createToken($admin);
			$data  = DB::table('password_resets')->insert([
					'email'      => $admin->email,
					'token'      => $token,
					'created_at' => Carbon::now(),
				]);
			Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
			session()->flash('success', trans('تم ارسال رابط تحقق  من بريدك'));
			return back();
		}
		return back();
	}

	public function reset_password_final($token) {

		$this->validate(request(), [
				'password'              => 'required|confirmed',
				'password_confirmation' => 'required',
			], [], [
				'password'              => 'Password',
				'password_confirmation' => 'Confirmation Password',
			]);

		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		if (!empty($check_token)) {
			$admin = Admin::where('email', $check_token->email)->update([
					'email'    => $check_token->email,
					'password' => bcrypt(request('password'))
				]);
			DB::table('password_resets')->where('email', request('email'))->delete();
			admin()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
			return redirect(url());
		} else {
			return redirect(url('admin/forgot/password'));
		}
	}

	public function reset_password($token) {
		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		if (!empty($check_token)) {
			return view('admin.admins.reset_password', ['data' => $check_token]);
		} else {
			return redirect(url('admin/forgot/password'));
		}
	}
}
