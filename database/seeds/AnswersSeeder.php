<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Interst;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->truncate();
        $answers = [

            // 3 لون بشرتك
            [
                'content' => 'أسمر',
                'qu_id' => '3',
            ],
            [
                'content' => 'قمحى مائل للسمار',
                'qu_id' => '3',
            ],
            [
                'content' => 'قمحى مائل للبیاض',
                'qu_id' => '3',
            ],
            [
                'content' => 'أبیض',
                'qu_id' => '3',
            ],
// 4- هل تمارس الرياضة؟

            [
                'content' => 'أمارس الریاضة بإنتظام',
                'qu_id' => '4',
            ],

            [
                'content' => 'أمارس الریاضة أحیانا',
                'qu_id' => '4',
            ],

            [
                'content' => 'لا أمارس الریاضة',
                'qu_id' => '4',
            ],
            // 5 - هل تمارسين الرياضة
            [
                'content' => 'أمارس الریاضة بإنتظام',
                'qu_id' => '5',
            ],

            [
                'content' => 'أمارس الریاضة أحیانا',
                'qu_id' => '5',
            ],

            [
                'content' => 'لا أمارس الریاضة',
                'qu_id' => '5',
            ],
            // نوع شقة الزواج 11
            [
                'content' => 'شقة إیجار  قدیم',
                'qu_id' => '11',
            ],
            [
                'content' => 'شقة إیجار جدید',
                'qu_id' => '11',
            ],
            [
                'content' => 'شقة تملیك ',
                'qu_id' => '11',
            ],
            [
                'content' => 'منزل تملیك ',
                'qu_id' => '11',
            ],

            //  الحالة الاجتماعية

            [
                'content' => 'أعزب  ',
                'qu_id' => '17',
            ],
            [
                'content' => 'مطلق  ',
                'qu_id' => '17',
            ],
            [
                'content' => 'أرمل  ',
                'qu_id' => '17',
            ],
            [
                'content' => 'متزوج  ',
                'qu_id' => '17',
            ],

            //  الحالة الاجتماعية

            [
                'content' => 'عزباء  ',
                'qu_id' => '18',
            ],
            [
                'content' => 'مطلقة  ',
                'qu_id' => '18',
            ],
            [
                'content' => 'أرملة  ',
                'qu_id' => '18',
            ],
            [
                'content' => 'متزوجة  ',
                'qu_id' => '18',
            ],

            //ھل ترغب بإنجاب الأطفال من زواجك القادم

            [
                'content' => 'نعم جدا  ',
                'qu_id' => '28',
            ],

            [
                'content' => 'بالتفاھم مع زوجتى القادمة  ',
                'qu_id' => '28',
            ],

            [
                'content' => 'لا أرغب بالإنجاب من زواجى القادم  ',
                'qu_id' => '28',
            ],


            //طائفتك
            //  -  -  - (

            [
                'content' => 'الكاثولیكیة  ',
                'qu_id' => '30',
            ],
            [
                'content' => 'البروتستانتیة  ',
                'qu_id' => '30',
            ],
            [
                'content' => 'الأرثوذكسیة المشرقیة  ',
                'qu_id' => '30',
            ],
            [
                'content' => 'الأرثوذكسیة الشرقیة  ',
                'qu_id' => '30',
            ],




            // [
            //     'content' => 'دكتوراة',
            //     'qu_id' => '1',
            // ],
            // [
            //     'content' => 'دكتوراة',
            //     'qu_id' => '1',
            // ],
            [
                'content' => 'دكتوراة',
                'qu_id' => '36',
            ],
            [
                'content' => 'ماجستير',
                'qu_id' => '36',
            ], ['content' => 'دبلوم عالي',
                'qu_id' => '36',
            ], ['content' => 'مؤهل جامعي',
                'qu_id' => '36',
            ], ['content' => 'مؤهل فوق المتوسط',
                'qu_id' => '36',
            ], ['content' => 'مؤهل متوسط',
                'qu_id' => '36',
            ], ['content' => 'إعدادية',
                'qu_id' => '36',
            ],
            [
                'content' => 'أدرس فقط',
                'qu_id' => '41',
            ], ['content' => 'أعمل فقط',
                'qu_id' => '41',
            ], ['content' => 'أعمل وأدرس',
                'qu_id' => '41',
            ], ['content' => 'لا أعمل حاليا',
                'qu_id' => '41',
            ],

            [
                'content' => 'موجود',
                'qu_id' => '49',
            ],
            [
                'content' => 'متوفي',
                'qu_id' => '49',
            ],

        ];
        $living_countries =  $this->set_counries_to_question(7);
        $living_cities =  $this->set_cities_to_question(8);
        $living_cities =  $this->set_interests_to_question(6);

       $all =  array_merge($answers,$living_countries, $living_cities);

        DB::table('answers')->insert($all);
    }

    protected function set_counries_to_question($question_id){
        return Country::get()->map(function ($country) use($question_id) {
            return [
                 'content' => $country->ar_title,
                 'qu_id' => $question_id,
             ];
         })->toArray();
    }
    protected function set_cities_to_question($question_id){
        return City::get()->map(function ($city) use($question_id) {
            return [
                 'content' => $city->name,
                 'qu_id' => $question_id,
             ];
         })->toArray();
    }
    protected function set_interests_to_question($question_id){
        return Interst::get()->map(function ($interest) use($question_id) {
            return [
                 'content' => $interest->name,
                 'qu_id' => $question_id,
             ];
         })->toArray();
    }
}
