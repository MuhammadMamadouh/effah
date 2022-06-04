<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_degrees')->truncate();
        $educational_degrees = [
            [
                'name'=>'دكتوراه',
            ],
            [
                'name'=>'ماجستير',
            ],
            [
                'name'=>'دراسات عليا',
            ],
            [
                'name'=>'شهادة الليسانس | البكالريوس',
            ],
            [
                'name'=>'معهد فني',
            ],
            [
                'name'=>'الثانوية',
            ],
            [
                'name'=>'بلا مؤهل',
            ],
            [
                'name'=>'الابتدائية',
            ],
            [
                'name'=>'الاعدادية',
            ],
            [
                'name'=>'شهادة محو الامية',
            ],

    ];

        DB::table('education_degrees')->insert($educational_degrees);
    }
}
