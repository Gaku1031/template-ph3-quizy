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
            ],  [
                'id' => 5,
                'study_date' => '2023-01-23',
                'study_contents' => 'N予備校',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 6,
                'study_date' => '2023-01-24',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 7,
                'study_date' => '2023-01-26',
                'study_contents' => 'ドットインストール',
                'study_languages' => 'HTML',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 8,
                'study_date' => '2023-01-27',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'JavaScript',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 9,
                'study_date' => '2023-01-28',
                'study_contents' => 'N予備校',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 10,
                'study_date' => '2023-01-29',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 11,
                'study_date' => '2023-01-30',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 12,
                'study_date' => '2023-01-31',
                'study_contents' => 'ドットインストール',
                'study_languages' => 'CSS',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 13,
                'study_date' => '2023-01-01',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 14,
                'study_date' => '2023-01-02',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 15,
                'study_date' => '2023-01-03',
                'study_contents' => 'ドットインストール',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 16,
                'study_date' => '2023-01-04',
                'study_contents' => 'N予備校',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 17,
                'study_date' => '2023-01-05',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 18,
                'study_date' => '2023-01-06',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'JavaScript',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 19,
                'study_date' => '2023-01-07',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 20,
                'study_date' => '2023-01-08',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 21,
                'study_date' => '2023-01-09',
                'study_contents' => 'ドットインストール',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 22,
                'study_date' => '2023-01-10',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 23,
                'study_date' => '2023-01-11',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 24,
                'study_date' => '2023-01-12',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 25,
                'study_date' => '2023-01-13',
                'study_contents' => 'N予備校',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 26,
                'study_date' => '2023-01-14',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 27,
                'study_date' => '2023-01-15',
                'study_contents' => 'ドットインストール',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 28,
                'study_date' => '2023-01-16',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 29,
                'study_date' => '2023-01-17',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 30,
                'study_date' => '2023-01-18',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'PHP',
                'study_hours' => 3,
                'post_id' => 1,
            ],  [
                'id' => 31,
                'study_date' => '2023-01-19',
                'study_contents' => 'POSSE課題',
                'study_languages' => 'Laravel',
                'study_hours' => 3,
                'post_id' => 1,
            ]
        ]);
    }
}
