<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study')->insert([
            [
                'id' => 1,
                'study_date' => '2023-01-20',
                'study_contents' => 'N予備校',
                'study_languages' => 'HTML',
                'study_hours' => 3.5,
                'post_id' => 1,
            ], [
                'id' => 2,
                'study_date' => '2023-01-21',
                'study_contents' => 'ドットインストール',
                'study_languages' => 'CSS',
                'study_hours' => 3,
                'post_id' => 1,
            ], [
                'id' => 3,
                'study_date' => '2023-01-22',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 4,
                'post_id' => 1,
            ], [
                'id' => 4,
                'study_date' => '2023-01-25',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ]
        ]);
    }
}
