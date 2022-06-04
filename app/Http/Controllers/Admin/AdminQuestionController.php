<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['questions']=Question::whereIn('category_id',$this->questionCategory())->orderBy('order','desc')->get();
      return view('admin.questions.index',$data) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Category::whereIn('id',$this->questionCategory())->get();
        $data['questions']=Question::whereIn('category_id',$this->questionCategory())->where('type',2)->get();
              return view('admin.questions.create',$data) ;


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
            'category_id' => 'required',
        ]);
        $qu=new Question();
        $qu->content=$request->ar_title;
        $qu->gender=$request->gender;
        $qu->ans_id=$request->ans_id;
        $qu->qu_id=$request->qu_id;
        if($request->qu_id){
            $qu->level=1;
        }
        $qu->category_id=$request->category_id;
        $qu->type=$request->type;
        $qu->save();
        if($qu->type!=1){
            $schedules = [];

            if (isset($request->answers) && count($request->answers) > 1) {
                foreach ($request->answers as $day => $v) {
                    $schedules[] = [
                        'qu_id' => $qu->id,
                        'type' => $qu->type,
                        'content' => $request->answers[$day],




                    ];
                }

                foreach ($schedules as $ss){

                    if($ss['content'] && $ss['qu_id']){
                        $ini=new Answer();
                        $ini->qu_id=$ss['qu_id'];
                        $ini->content=$ss['content'];
                        $ini->type=$ss['type'];

                        $ini->save();


                    }
                }

            }
        }
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('question.index'));
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
        $data['question']=Question::find($id);
        $data['categories']=Category::whereIn('id',$this->questionCategory())->get();
        return view('admin.questions.edit',$data) ;
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
            'category_id' => 'required',
        ]);
        $qu= Question::find($id);
        $qu->content=$request->ar_title;
        $qu->gender=$request->gender;
        $qu->category_id=$request->category_id;
        $qu->save();
        toastr()->success(trans('main.Message_success'), trans('main.Message_title_congratulation'));

        return redirect(route('question.index'));
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
    public function order(Request $request,$id)
    {
       $qu=Question::find($id);
       $qu->order+=$request->type;
       $qu->save();
       return  redirect( route('question.index'));
    }
    public function active($id)
    {
       $qu=Question::find($id);
       if($qu->is_active==1) {
           $qu->is_active = 0;
       }else{
           $qu->is_active = 1;

       }
       $qu->save();
       return  redirect( route('question.index'));
    }
    public  function questionCategory(){




        if( admin()->user()->religion ==0) {
            $ca = \App\Models\Category::pluck('id')->toArray();
            return $ca;
        }else{
            $ca = \App\Models\Category::where('re_id',admin()->user()->religion)->pluck('id')->toArray();
            return $ca;
        }

    }
    public function get_all_answers(Request $request)
    {


        $subs = Answer::where('qu_id', $request->id)->where('is_active',1)->get();
        $options = '';

        if ($subs->count() != 0) {

            foreach ($subs as $sub) {


                $options .= '<option value="' . $sub->id . '">' . $sub->content . '</option>';

            }
        }
        return response($options,200);
    }
}
