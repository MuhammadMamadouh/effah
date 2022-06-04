<?php

namespace App\Http\Resources;

use App\Constants\QuestionType;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnswersResource;
class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->type == QuestionType::TEXT)
            $type = 'text';
        else if($this->type == QuestionType::ONE_CHOICE)
        $type = 'one_choice';
        else if($this->type == QuestionType::MULTIPLE_CHOICE)
        $type = 'multiple_choice';
        else if($this->type == QuestionType::DIGITAL)
        $type = 'digital';

        return [
            'id' => $this->id,
            'content' => $this->content,
            'type'  => $type,
            // 'type_id'
            'answers' => count($this->answers) > 0 ? AnswersResource::collection($this->answers) : '',

        ];
    }
}
