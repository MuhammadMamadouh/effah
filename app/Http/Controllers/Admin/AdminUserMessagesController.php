<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\UserMessage;
use Illuminate\Http\Request;

class AdminUserMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            $messages=ContactUs::all();

        return view('admin.messages.index',['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['countries']=Country::all();
        return  view('admin.messages.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|max:190',
            'email' => 'required|max:190',
        ]);

        $product=new ContactUs();

        $product->name=$request->name;
        $product->email=$request->email;
        $product->phone=$request->phone;
        $product->content=$request->text;

        $product->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['message']=UserMessage::find($id);


        return  view('admin.messages.edit',$data);
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
        $this->validate($request,[

            'ar_title' => 'required|max:190',
            'en_title' => 'required|max:190',
        ]);

        $product= UserMessage::find($id);

        $product->ar_title=$request->ar_title;
        $product->en_title=$request->en_title;
        $product->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('messages.index'));
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


        $good= ContactUs::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }
    public function is_active($id)
    {
        $user=UserMessage::findOrFail($id);
        if ($user->is_block==0) {
            $user->is_block = 1;
        } else {
            $user->is_block = 0;
        }
        $user->save();
        toastr()->success('تمت العملية بنجاح !','تهانينا');
        return redirect(route('messages.index'));
    }//end
}
