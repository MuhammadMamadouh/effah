<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('marital_status')->truncate();
        $marital_status = [
            [
                'name' => 'اعزب/آنسة',
            ],
            [
                'name' => 'متزوج/متزوجة',
            ],
            [
                'name' => 'مطلق/مطلقة',
            ],
            [
                'name' => 'أرمل/أرملة',
            ],
        ];

        DB::table('marital_status')->insert($marital_status);

    }
}
