<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\SubCity;
use Illuminate\Http\Request;

class AdminSubCityContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citiesid=City::where('country_id',1)->pluck('id')->toArray();
        $cities=SubCity::whereIn('city_id',$citiesid)->get();

        return view('admin.subcities.index',['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries']=City::where('country_id',1)->get();

        return  view('admin.subcities.create',$data);
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
            'en_title' => 'required',
            'country_id' => 'required',
        ]);

        $product=new SubCity();

        $product->name=$request->ar_title;
        $product->name_en=$request->en_title;
        $product->city_id=$request->country_id;

        $product->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('subcities.index'));
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
        $data['city']=SubCity::find($id);
        $data['countries']=City::where('country_id',1)->get();


        return  view('admin.subcities.edit',$data);
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

            'ar_title' => 'required',
            'en_title' => 'required',
            'country_id' => 'required',
        ]);

        $product= SubCity::find($id);

        $product->name=$request->ar_title;
        $product->name_en=$request->en_title;
        $product->city_id=$request->country_id;
        $product->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('subcities.index'));
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


        $good= SubCity::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }
}
