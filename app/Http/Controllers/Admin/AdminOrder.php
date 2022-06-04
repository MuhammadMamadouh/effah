<?php


namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Notification;
use App\Order;
use App\OrderDetailes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class AdminOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\with('users')-> Http\Response
     */
    public function index()
    {
       $data['orders']=Order::with('user')->with('to')->get();
       return view('admin.allOrders.index',$data);
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
      $data['order']=Order::find($id);
      $data['orderDetailes']=OrderDetailes::where('order_id',$id)->get();
        return view('admin.allOrders.show',$data);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request)
    {
        $good= Order::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }//end
    public function sendNots ($id){
        $OrderD=OrderDetailes::where('id',$id)->first();
        $from=Order::where('id',$OrderD->order_id)->first();
        $not=new Notification();
        $not->form_id=$from->form_id;
        $not->to_id=$from->to_id;
        $not->notification_date=strtotime(now());
        $not->type=1;
        $not->notification_name=1;
        $not->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return back();
    }
}
