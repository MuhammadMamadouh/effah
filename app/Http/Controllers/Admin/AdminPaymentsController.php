<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::where('accepted',0)->orderBy('created_at','desc')->get();
        return view('admin.pyments.newCharge')->with(['payments'=>$payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $pay=Payment::find($id);
       $pay->accepted=1;
       $pay->save();
       $wallet=Wallet::where('user_id',$pay->user_id)->first();
        if ($wallet) {
            $wallet->balance += $pay->amount;
            $wallet->save();
        } else {
            $wallet=new Wallet();
            $wallet->balance += $pay->amount;
            $wallet->user_id=$pay->user_id;
            $wallet->save();
        }
        toastr()->success('تم التعديل بنجاح','تم');

        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $payment=Payment::find($request->id);
        if ($payment){
            $imageName = url("{$payment->image}"); // get previous image from folder
            if (File::exists($imageName)) { // unlink or remove previous image from folder
                unlink($imageName);
            }

        }

        $good= Payment::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }//end

}
