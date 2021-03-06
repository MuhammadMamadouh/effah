<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\AccountApprovedNotifiction;
use Illuminate\Support\Facades\File;


class AdminUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  $country=admin()->user()->religion;
        if($country==0) {
            $users=User::where('religion_id',1)->get();
        }else{
            $users=User::where('religion_id',$country)->get();

        }
        return view('admin.users.index')->with(['users'=>$users]);
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
        $user=User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }


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
        // is_activeAd
    }
    public function is_active($id)
    {
        $user=User::findOrFail($id);
        if ($user->is_block==0) {
            $user->is_block = 1;
        } else {
            $user->is_block = 0;
        }
        $user->save();
        toastr()->success('تمت العملية بنجاح !','تهانينا');
        return redirect(route('users.index'));
    }//end
    public function is_activeAd($id)
    {
        $user=Ad::findOrFail($id);
        if ($user->is_active==0) {
            $user->is_active = 1;
        } else {
            $user->is_active = 0;
        }
        $user->save();
        toastr()->success('تمت العملية بنجاح !','تهانينا');
        return redirect(route('sliders.index'));
    }//end
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

    public function savepoints(Request $request){
        // dd($request->all());
        foreach($request->users as $user){
            $user=User::findOrFail($user);
            $user->points=$request->points;
            $user->save();
        }
        // toastr()->success('تمت العملية بنجاح !','تهانينا');
        return redirect(route('users.index'))->with('success','تمت العملية بنجاح !');
    }
    public function approveUser(Request $request){
// dd($request->all());
$data = $this->validate($request, [
    'user_id' => 'required|numeric|exists:users,id',
    'id_no' => 'required|string|unique:users,idNumber',
],
    [
        'user_id.exists' => 'يجب ادخال صورتين كحد أقصى',
        'id_no.*.required' => 'رقم البطاقة مطلوب',
        'id_no.*.unique' => 'رقم البطاقة مسحل من قبل',

    ]
);
            $user=User::findOrFail($request->user_id);
            $user->idNumber=$request->id_no;
            $user->is_approved=true;
            $user->save();
            $user->notify(new AccountApprovedNotifiction());

        // toastr()->success('تم تأكيد الحساب !','تهانينا');
        return redirect(route('users.index'))->with('success','تمت العملية بنجاح !');
    }
}
