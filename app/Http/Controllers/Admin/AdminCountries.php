<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
class AdminCountries extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries']=Country::all();
        return view('admin.countries.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');

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

            'ar_title' => 'required',
            'phone_code' => 'required|numeric|digits_between:1,20',

        ]);

        $product=new Country();

        $product->ar_title=$request->ar_title;
        $product->en_title=$request->en_title;
        $product->phone_code=$request->phone_code;
        if ($request->flag){


            $image = $request->file('flag');
            $imageName = time() . '.' .\request('flag')->getClientOriginalExtension();
            $product->flag = 'uploads/countries/'.$imageName;
            $image->move('uploads/countries', $imageName);
        }


        $product->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('countries.index'));
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
        $data['country']=Country::find($id);
        return view('admin.countries.edit',$data);
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
        {
            $this->validate($request, [

                'ar_title' => 'required',
                'phone_code' => 'required|numeric|digits_between:1,20',

            ]);

            $product = Country::find($id);

            $product->ar_title = $request->ar_title;
            $product->en_title = $request->en_title;
            $product->phone_code=$request->phone_code;

            if ($request->flag){


                $image = $request->file('flag');
                $imageName = time() . '.' .\request('flag')->getClientOriginalExtension();
                $product->flag = 'uploads/countries/'.$imageName;
                $image->move('uploads/countries', $imageName);
            }

            $product->save();
            toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

            return redirect(route('countries.index'));
        }
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
        $c=Country::find($request->id);
        if ($c){
            $imageName = url("{$c->flag}"); // get previous image from folder
            if (File::exists($imageName)) { // unlink or remove previous image from folder
                unlink($imageName);
            }

        }

        $good= Country::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }

}
