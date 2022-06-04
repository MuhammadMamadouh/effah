<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdImage;
use App\Models\Category;
use App\Models\Country;
use App\User;
use Illuminate\Http\Request;

class AdminSpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries']=Country::all();
        $data['categories']=Category::all();
        $country=admin()->user()->country_id;
        if($country==0) {
            $users = User::where('country_id', '!=', null)->pluck('id')->toArray();
        }else{
            $users = User::where('country_id',  $country)->pluck('id')->toArray();

        }
        $data['ads']=Ad::where('is_special',1)->whereIn('user_id',$users)->orderBy('country_id','asc')->get();        return view('admin.spacialAds.index',$data);
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
        $data['images']=AdImage::where('ad_id',$id)->orderBy('country_id','asc')->get();
        $data['ad']=Ad::find($id);

        return view('admin.spacialAds.show',$data);

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


        $good= Ad::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }
}
