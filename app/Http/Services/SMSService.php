<?php

namespace App\Http\Services;

use App\Models\VerificationCode;

class SMSService
{

    public function sendSMS($phone, $message)
    {
        $message = new VictoryLink([
            'username' => 'YOUR_USERNAME',
            'password' => 'YOUR_PASSWORD',
            'sender' => 'YOUR_SENDER',
            'language' => 'MESSAGE LANGUAGE ex: e',
        ]);

        $message->send([
            'to' => '+201111111111',
            'message' => "Your Message Goes Here",
        ]);
        // $url = 'https://api.kavenegar.com/v1/' . env('KAVENEGAR_API_KEY') . '/sms/send.json';
        // $data = [
        //     'receptor' => $phone,
        //     'message' => $message,
        // ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $result = curl_exec($ch);
        // curl_close($ch);
        // return $result;
    }

    public function setVirificationCode($data)
    {
        $code = mt_rand(100000, 999999);
        $data['code'] = $code;

        VerificationCode::whereNotNull('user_id')->where('user_id', $data['user_id'])->delete();

        return VerificationCode::create($data);
    }
}
