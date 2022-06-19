<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->truncate();
        $points = [
            [
                'name' => 'سعر إظھار بیانات الوالد فى حالة القبول',
                'points' => 35,
            ],
            [
                'name' => 'سعر إتاحة الفلتر لمدة أسبوع ',
                'points' => 45,
            ],
            [
                'name' => 'سعر إتاحة الفلتر لمدة أسبوعین',
                'points' => 80,
            ],
            [
                'name' => 'البنت كل مشاركة للتطبیق',
                'points' => 25,
            ],
        ];
        DB::table('points')->insert($points);
    }
}
