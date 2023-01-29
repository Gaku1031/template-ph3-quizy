<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Study;

class StudyController extends Controller
{
    public function add() {
        return view('user/study_record');
    }

    public function create(Request $request) {
        $contents = $request->contents;
        $languages = $request->languages;

        $contents_data = [];
        foreach ($contents as $content) {
            $contents_data[] = [
                'study_contents' => $content,
            ];
        }

        $languages_data = [];
        foreach ($languages as $language) {
            $languages_data[] = [
                'study_languages' => $language,
            ];
        }

        for ($i = 0; $i < count($contents_data); $i++) {
            for ($j = 0; $j < count($languages_data); $j++) {
                $param = [
                    'study_date' => $request->datepicker,
                    'study_contents' => implode($contents_data[$i]),
                    'study_languages' => implode($languages_data[$j]),
                    'study_hours' => $request->hours,
                    'post_id' => $request->input('post_id'),
                ];
            }
        }
        dd(count($contents_data));
        Study::insert($param);
    return redirect('/');
    }
}
