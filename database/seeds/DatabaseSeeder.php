<?php

use App\Models\EducationWork;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(AnswersSeeder::class);
        $this->call(MaritalStatusSeeder::class);
        $this->call(EducationWorkSeeder::class);
        $this->call(EducationDegreeSeeder::class);
        $this->call(InterestsTableSeeder::class);
        $this->call(AnswersQuestionsTableSeeder::class);
    }
}
