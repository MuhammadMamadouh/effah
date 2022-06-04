<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\JewelleryOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::all();
        return view('admin.contacts.index')->with(['contacts'=>$contacts]);
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
        $j=JewelleryOrder::find($id);
        $j->is_accepted=2;
        $j->save();
        return  back();
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
    }//end

    public function delete(Request $request)
    {
        $good= Contact::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }


  public function email_view($id)
    {

        $contact=Contact::find($id);
        return view('admin.contacts.send-email')->with(['contact'=>$contact]);

    }//end


    public function send_Email(Request $request)
    {


        $email=$request->email;
        $emailtext=$request->text;
        $contact_company='registerme.com';
        $subject='email to subscriber';
        Mail::send(['html' => 'admin.setting.email-tem'], ['text' => $emailtext,'email'=>$email],
            function($message) use ($email, $subject, $contact_company)
            {
                $message->to($email,$contact_company)->subject($subject);
            }
        );
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect()->route('contacts.index');
    }//end fun*/


}
