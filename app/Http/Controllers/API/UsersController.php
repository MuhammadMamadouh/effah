<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndexUserResource;
use App\Http\Resources\IndexUsersResource;
use App\Http\Resources\UserResource;
use App\Models\QuestionAnswerUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $answers =  QuestionAnswerUser::where('user_id', '=', Auth::user()->id)->pluck('answer_id');

        $user_answers =  QuestionAnswerUser::whereIn('answer_id', $answers)->get()->groupBy('user_id')
        ->map(function($item, $key){
            return User::find($key);
        })        ;
        // return $user_answers;
        return IndexUsersResource::collection($user_answers);
    }

    public function show($id){

        return new UserResource(User::findOrFail($id));
    }
}
