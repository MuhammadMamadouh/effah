<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class AdminAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::where('id','!=',\admin()->user()->id)->get();
        return view('admin.admins.index')->with(['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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
            'name' => 'required|string',
            'email' =>'required|string|email|max:191|unique:admins',
            'password' => 'required|string|max:191',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'phone' => 'required|numeric|digits_between:1,20|unique:admins',


        ]);
        $admin=new Admin();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->phone=$request->phone;

        $admin->password=bcrypt($request->password);
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $uploadedImage = $request->file('imagePath');
            $imageName = time() . '.' .\request('image')->getClientOriginalExtension();
            $admin->image = 'admins/'.$imageName;
            $image->move('upload/admins', $imageName);
        }





        $admin->save();
        toastr()->success('تم الاضافة بنجاح','تم');

        return redirect(route('admins.index'));
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
        $admin=Admin::find($id);
        return view('admin.admins.edit')->with(['admin'=>$admin]);
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
        $admin=Admin::find($id);

        $this->validate($request,[
            'name' => 'required|string',
            'email' =>'required|string|email|max:255',
            'password' => 'nullable|string|max:191',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'phone' => 'required|numeric|digits_between:1,20',


        ]);

        $admin_email=Admin::where('email','=',$request->email)->where('id','!=',$id)->get();

        if ($admin_email->count()!=0){
            toastr()->error(trans('main.Message_title_attention'), trans('main.Email_duplicate'));

            return back()->withInput();
        }


        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->phone=$request->phone;


        $admin->password=$request->password!=null?bcrypt($request->password):$admin->password;

        if ($request->image){

            $imageName = url("upload/{$admin->image}"); // get previous image from folder
            if (File::exists($imageName)) { // unlink or remove previous image from folder
                unlink($imageName);
            }

            $image = $request->file('image');
            $imageName = time() . '.' .\request('image')->getClientOriginalExtension();

            $admin->image = 'admins/'.$imageName;
            $image->move('upload/admins', $imageName);
        }

        $admin->save();
        toastr()->success('تم التعديل بنجاح','تم');

        return redirect(route('admins.index'));
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
$good= Admin::destroy($request->id);
if ($good)
return response(['error'=>0]);
else
return response(['error'=>1]);

}//end
}
