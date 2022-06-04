<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intersts')->truncate();
        $intersts = [
            [
                'name' => 'الرياضة',
            ],
            [
                'name' => 'التكنولوجيا',
            ],
            [
                'name' => 'الفلسفة',
            ],
            [
                'name' => 'علم النفس',
            ],
            [
                'name' => 'الفن',
            ],
            [
                'name' => 'العلوم',
            ],
        ];

        DB::table('intersts')->insert($intersts);
    }
}
