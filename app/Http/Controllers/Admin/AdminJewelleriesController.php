<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jewellery;
use Illuminate\Http\Request;

class AdminJewelleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data['jewelleries']=Jewellery::all();
     return view('admin.jewelleries.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return  view('admin.jewelleries.create');
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
            'amount' => 'required',
            'jewellery_value' => 'required',
        ]);

        $product=new Jewellery();

        $product->ar_title=$request->ar_title;
        $product->en_title=$request->en_title;
        $product->amount=$request->amount;
        $product->jewellery_value=$request->jewellery_value;
        $image = $request->file('image');
        $imageName = time() . '.' .\request('image')->getClientOriginalExtension();
        $product->image = 'uploads/jewellery/'.$imageName;
        $image->move('uploads/jewellery', $imageName);
        $product->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('jewelleries.index'));
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


        $good= Jewellery::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }

}
