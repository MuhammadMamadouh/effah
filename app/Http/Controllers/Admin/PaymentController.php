<?php

namespace App\Http\Controllers\Admin;


use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function getPayments(){
        $data['payments'] = Payment::all();
        return view('admin.payments.payments' , $data);
    }

    public function deletePayment($id){
        $data['payment'] = Payment::find($id)->delete();
        return back();
    }

    public function getPayment($id){
        $data['payment'] = Payment::find($id);
        return view('admin.payments.payment' , $data);
    }
}
