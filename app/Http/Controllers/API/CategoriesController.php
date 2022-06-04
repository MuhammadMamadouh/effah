<?php
namespace App\Http\Controllers\API;

use App\Constants\QuestionType;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\QuestionsResource;
use App\Models\Category;
use App\Models\Question;
use App\Models\QuestionAnswerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function questions($id)
    {
        $category = Category::findOrFail($id);

        return QuestionsResource::collection($category->questions_by_gender);
    }

    public function answers($id)
    {
        $question = Question::findOrFail($id);
        return $question->answers;
    }
    public function answerQuestion(Request $request)
    {

        $question = Question::findOrFail($request->qu_id);
        $answer['category_id']= $question->category_id;
        $answer['que_id'] = $question->id;
        $answer['type'] = $question->type;
        $answer['user_id'] = Auth::user()->id;


        if($question->type == QuestionType::TEXT || $question->type == QuestionType::DIGITAL) {
            $answer['content'] = $request->answer['text'];
            $question_answer = QuestionAnswerUser::create($answer);

        }else if($question->type == QuestionType::ONE_CHOICE){
            $answer['answer_id'] = $request->answer['one_choice'];
            $question_answer = QuestionAnswerUser::create($answer);
        } else if($question->type == QuestionType::MULTIPLE_CHOICE){
            foreach ($request->answer['multiple_choice'] as $key => $value) {
                $answer['answer_id'] = $value;
                $question_answer = QuestionAnswerUser::create($answer);            }
        }

        return response()->json('تم حفظ البيانات', 200);
    }
}
