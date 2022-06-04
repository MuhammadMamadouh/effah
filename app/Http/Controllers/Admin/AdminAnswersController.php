<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminAnswersController extends Controller
{
    public function index()
    {
        $data['answers']=Answer::whereIn('qu_id',$this->questionCategoryAnswer())->orderBy('qu_id','desc')->get();
        
        return view('admin.answers.index',$data) ;
    }
    public function create(){
        $data['questions']=Question::whereIn('id',$this->questionCategoryAnswer())->get();
        return view('admin.answers.create',$data) ;
    }
    public function store(Request  $request){
        $this->validate($request,[
            'ar_title' => 'required',
            'category_id' => 'required',
        ]);
        $que=Question::where('id',$request->category_id)->first();
        $qu=new Answer();
        $qu->content=$request->ar_title;
        $qu->qu_id=$request->category_id;
        if($que) {
            $qu->type = $que->type;
        }
        $qu->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('answers.index'));
    }
    public  function edit($id){
        $data['answer']=Answer::find($id);
        $data['questions']=Question::whereIn('id',$this->questionCategoryAnswer())->get();
        return view('admin.answers.edit',$data) ;

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'ar_title' => 'required',
            'category_id' => 'required',
        ]);
        $qu= Answer::find($id);
        $qu->content=$request->ar_title;
        $qu->qu_id=$request->category_id;
        $qu->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('answers.index'));
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


        $good= Answer::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }
}
