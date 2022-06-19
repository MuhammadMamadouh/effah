<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\UserResource;
use App\Http\Services\SMSService;
use App\Models\VerificationCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public $sms_service;

    public function __construct(SMSService $sms_service)
    {
        $this->sms_service = $sms_service;
    }

    public function login(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            $user->tokens()->delete();

            // if($user->is_active == 0){
            //     return response()->json([
            //         'message'=>trans('auth.inactive_failed'),
            //         'error'=>401],401);
            // }

            // if($user->is_lock == 1){
            //     return response()->json([
            //         'message'=>trans('auth.locked'),
            //         'error'=>401],401);
            // }

        }

        if (Auth::attempt(['phone' => $request->phone
            , 'password' => $request->password,
        ])) {
            // if($user->is_active == 1 && $user->is_lock == 0){

            Auth::onceUsingId($user->id);

            $token = $user->createToken('auth-token')->accessToken;
            $data = [
                'accessToken' => $token,
                'username' => $user->frName . ' ' . $user->lsName,
            ];
            return response()->json($data);
        }
        return response()->json([
            'message' => trans('auth.failed'),
            'error' => 401], 401);
    }

    public function register(RegistrationRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        Auth::loginUsingId($user->id);
        $token = $user->createToken('auth-token')->accessToken;
        $data = [
            'accessToken' => $token,
            'username' => $user->frName,
        ];
        $verification['user_id'] = $user->id;
        $this->sms_service->setVirificationCode($verification);
        return response()->json($data);
    }

    public function update(RegistrationRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json(['success' => "تم التعديل/ استكمال البيانات"]);

    }

    public function showProfile()
    {

        return new UserResource(Auth::user());
    }

    public function uploadPhotos(Request $request)
    {
        $data = $this->validate($request, [
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:3048',
        ],
            [
                'images.required' => 'يجب ادخال صورة',
                'images.*.required' => 'يجب ادخال صورة',
                'images.*.image' => 'يجب ادخال صورة',
                'images.*.mimes' => 'الصورة غير صحيحة',
            ]
        );

        foreach ($request->images as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            auth()->user()->images()->create([
                'image' => 'storage/' . Storage::disk('public')->put('users', $image),
            ]);
        }

        return response()->json(['success' => "تم اضافة الصور"]);

    }
    public function updateBio(Request $request)
    {
        $data = $this->validate($request, [
            'about_you' => 'nullable|string',
            'about_partner' => 'nullable|string',
        ],
            [
                'about_me.string' => 'النص غير صحيح',
                'about_partner.string' => 'النص غير صحيح',
            ]
        );
        auth()->user()->update($data);

        return response()->json(['success' => "تم اضافة البيانات"]);

    }

    public function verficationCode(Request $request)
    {
        $code = $request->code;
        $user_id = $request->user_id;
        $verification_code = VerificationCode::where('code', $code)->where('user_id', $user_id)->first();
        if ($verification_code) {
            $user = User::find($user_id);
            Auth::loginUsingId($user->id);
            $token = $user->createToken('auth-token')->accessToken;
            $data = [
                'accessToken' => $token,
                'frName' => $user->frName,
            ];
            $verification['user_id'] = $user->id;

            return response()->json($data);
        } else {
            return response()->json([
                'message' => ' كود التحقق غير صحيح',
            ], 401);
        }
    }

    public function confirmIdentity(Request $request)
    {
        $data = $this->validate($request, [
            'passport_image' => 'nullable|image',
            'identity_face' => 'nullable|image|mimes:jpeg,png,jpg|max:3048',
            'identity_back' => 'nullable|image|mimes:jpeg,png,jpg|max:3048',
        ],
            [
                'identity.max' => 'يجب ادخال صورتين كحد أقصى',
                'identity.*.required' => 'يجب ادخال صورة',
                'identity.*.image' => 'يجب ادخال صورة',
                'identity.*.mimes' => 'الصورة غير صحيحة',
            ]
        );
        if ($request->passport_image) {
            auth()->user()->passport_image = 'storage/' . Storage::disk('public')->put('users', $data['passport_image']);

        }
        if ($request->identity_face) {
            auth()->user()->identity_face = 'storage/' . Storage::disk('public')->put('users', $data['identity_face']);

        }
        if ($request->identity_back) {

            auth()->user()->identity_back = 'storage/' . Storage::disk('public')->put('users', $data['identity_back']);
        }
        auth()->user()->save();
        return response()->json(['success' => "ستتم المراجعة والرد عليك في أقرب وقت"]);
    }

    public function notifications(){
        $notifications = auth()->user()->unreadNotifications()->orderBy('created_at', 'desc')
        ->get(['id','data', 'created_at'])->map(function($item){
            return [
                'id' => $item['id'],
                'message' => $item->data['message'],
                'link' => $item->data['link'],
                'created_at' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });
        return response()->json($notifications);
    }
    public function read_notification($id){
        auth()->user()->notifications()->where('id', $id)
        ->first()->markAsRead();
        return response()->json(['success' => "تمت القراءة للإشعار"]);
    }

}
