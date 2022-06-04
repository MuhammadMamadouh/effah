<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionAnswerUser;
use Illuminate\Http\Request;

class AdminAnswerSuggest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['answers']=QuestionAnswerUser::where('is_active',1)->whereIn('qu_id',$this->questionCategoryAnswer())->orderBy('qu_id','desc')->get();
        return view('admin.suggestion.index',$data) ;
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
    public function edit($id)
    {
        $data['answer']=QuestionAnswerUser::find($id);
        $data['question']=Question::where('id',$data['answer']->qu_id)->first();
        return view('admin.suggestion.edit',$data) ;
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
       $d=QuestionAnswerUser::find($id);
        $data['question']=Question::where('id',$d->qu_id)->first();
        $ans=new Answer();
        $ans->type=  $data['question']->type;
        $ans->qu_id=  $data['question']->id;
        $ans->content=  $request->ar_title;
        $ans->save();
        $dr=new QuestionAnswerUser();
        $dr->type=  $data['question']->type;
        $dr->qu_id=  $data['question']->id;
        $dr->user_id=  $d->user_id;
        $dr->answer_id=  $ans->id;
        $dr->is_active=  0;
        $dr->save();
        $d->delete();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('suggestion.index'));

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
    public  function questionCategoryAnswer(){




        if( admin()->user()->religion ==0) {
            $ca = \App\Models\Category::pluck('id')->toArray();
            $qu=Question::where('type','!=',1)->whereIn('category_id',$ca)->pluck('id')->toArray();
            return $qu;

        }else{
            $ca = \App\Models\Category::where('re_id',admin()->user()->religion)->pluck('id')->toArray();
            $qu=Question::where('type','!=',1)->whereIn('category_id',$ca)->pluck('id')->toArray();

            return $qu;
        }

    }
    public function delete(Request $request)
    {


        $good= QuestionAnswerUser::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }
}
