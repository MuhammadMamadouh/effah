<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function countries(){
        return Country::all()->map(function($item){
            return ['id' => $item->id, 'name' => $item->ar_title];
        });
    }

    public function cities($id)
    {
        return Country::find($id)->cities->map(function($item){
            return ['id' => $item->id, 'name' => $item->name];
        });
    }


    public function gender()
    {
        return ['1' => 'Male', '2' => 'Female'];
    }
}
