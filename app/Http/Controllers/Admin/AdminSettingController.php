<?php

namespace App\Http\Controllers\Admin;

use App\Http\GoogleMaps;
use App\Models\Setting;
use App\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Validator;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.setting');
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
    public function edit($id,Request $request)
    {

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
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif',

            'ar_title' =>'required|string|max:191',
            'address1' => 'required|string|max:191',
            'address2' =>'required|string|max:191',
            'phone1' => 'required|string|max:191',
            'phone2' =>'required|string|max:191',
            'android_app' => 'required|string|max:191',
            'ios_app' =>'required|string|max:191',
            'email1' => 'required|string|max:191',
            'email2' =>'required|string|max:191',


        ]);
        $request['longitude'] = substr($request['longitude'], 0, 9);
        $request['latitude'] = substr($request['latitude'], 0, 9);

        $setting=Setting::find($id);
        $setting->en_title=$request->en_title;
        $setting->ar_title=$request->ar_title;
        $setting->address1=$request->address1;
        $setting->address2=$request->address2;
        $setting->phone1=$request->phone1;
        $setting->phone2=$request->phone2;

        $setting->android_app=$request->android_app;
        $setting->ios_app=$request->ios_app;
        $setting->email2=$request->email2;
        $setting->gmail_link=$request->gmail_link;
        $setting->facebook_link=$request->facebook_link;
        $setting->tewtter_link=$request->tewtter_link;
        $setting->rss_link=$request->rss_link;
        $setting->insta_link=$request->insta_link;

        //upload the logo

        if ($request->logo){

            $imageName = url("upload/{$setting->logo}"); // get previous image from folder
            if (File::exists($imageName)) { // unlink or remove previous image from folder
                unlink($imageName);
            }

            $image = $request->file('logo');
            $imageName = time() . '.' .\request('logo')->getClientOriginalExtension();
            $setting->logo = 'setting/'.$imageName;
            $image->move('upload/setting', $imageName);
        }




        $setting->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('setting.index'));
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
    public function createMap($zoom = 6, $lat = 27.511411, $long = 41.720825, $draggable = true)
    {
        $settinges=Setting::orderBy('id','desc')->first();
        $la=$settinges->latitude;
        $lg=$settinges->longitude;
        $theMap = new GoogleMaps();
        $config = array();
        $config['zoom'] = $zoom;
        $config['center'] = "{$la}, {$lg}";//'auto';
        $config['onboundschanged'] = '  if (!centreGot) {
                                            var mapCentre = map.getCenter();
                                            marker_0.setOptions({
                                                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                                            });
                                            $("#latitude").val(mapCentre.lat());
                                            $("#longitude").val(mapCentre.lng());
                                        }
                                        centreGot = true;';
        $config['geocodeCaching'] = TRUE;
        $marker = array();
        $marker['draggable'] = $draggable;
        $marker['ondragend'] = '$("#latitude").val(event.latLng.lat());$("#longitude").val(event.latLng.lng());';
        $marker['title'] = 'أنت هنا .. من فضلك قم بسحب العلامة ووضعها على المكان الصحيح';
        $theMap->initialize($config);
        $theMap->add_marker($marker);
        $data['maps'] = $theMap->create_map();
        return $data;
    }

}
