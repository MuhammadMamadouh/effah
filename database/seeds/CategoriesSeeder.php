<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $categories = [
            [
                'name' => 'البيانات الشخصية والجسدية',
            ],
            [
                'name' => 'الدين والحالة الاجتماعية',
            ],
            [
                'name' => 'التعليم والعمل',
            ],
            [
                'name' => 'العائلة ',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
