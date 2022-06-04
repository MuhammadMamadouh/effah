<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_works')->truncate();
        $marital_status = [
            [
                'name' => 'أدرس فقط',
            ],
            [
                'name' => 'أعمل فقط',
            ],
            [
                'name' => 'أعمل وأدرس',
            ],
            [
                'name' => 'لا أعمل حاليا',
            ],
        ];

        DB::table('education_works')->insert($marital_status);

    }
}
