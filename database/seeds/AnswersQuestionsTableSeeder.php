<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_answer_users')->truncate();

        $answers =[
            [
                'qu_id' => 3,
                'answer_id' => '3',
                'user_id' => '3',
                'category_id' => '1',
            ],
            [
                'qu_id' => 4,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '1',
            ],
            [
                'qu_id' => 11,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '1',
            ],
            [
                'qu_id' => 17,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '2',
            ],
            [
                'qu_id' => 28,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '2',
            ],
            [
                'qu_id' => 31,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '2',
            ],
            [
                'qu_id' => 32,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '2',
            ],
            [
                'qu_id' => 36,
                'answer_id' => '1',
                'user_id' => '3',
                'category_id' => '2',
            ],
            [
                'qu_id' => 3,
                'answer_id' => '3',
                'user_id' => '4',
                'category_id' => '1',
            ],
            [
                'qu_id' => 4,
                'answer_id' => '1',
                'user_id' => '4',
                'category_id' => '1',
            ],
            [
                'qu_id' => 11,
                'answer_id' => '1',
                'user_id' => '4',
                'category_id' => '1',
            ],
            [
                'qu_id' => 17,
                'answer_id' => '1',
                'user_id' => '4',
                'category_id' => '2',
            ],
            [
                'qu_id' => 28,
                'answer_id' => '1',
                'user_id' => '4',
                'category_id' => '2',
            ],
            [
                'qu_id' => 41,
                'answer_id' => '1',
                'user_id' => '5',
                'category_id' => '2',
            ],
            [
                'qu_id' => 42,
                'answer_id' => '1',
                'user_id' => '4',
                'category_id' => '2',
            ],
            [
                'qu_id' => 46,
                'answer_id' => '1',
                'user_id' => '5',
                'category_id' => '2',
            ],
        ];
        DB::table('question_answer_users')->insert($answers);
    }
}
