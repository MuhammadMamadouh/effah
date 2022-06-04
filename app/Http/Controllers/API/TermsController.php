<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SiteText;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    //
    public function terms(){
        $terms = SiteText::where('key_word', 'terms')->where('lang', 'ar')->first();

        return response()->json(array('title' => $terms->title, 'content' => $terms->content));
    }
}
