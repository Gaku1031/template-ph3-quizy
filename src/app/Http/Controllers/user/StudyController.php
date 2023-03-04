<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Study;
use Artisan;

class StudyController extends Controller
{
    public function index() {
        $data = new Study;

        //jsonファイルまでのパスを設定
        $url1 = asset('js/hours.json');
        $url2 = asset('js/languagesHours.json');
        $url3 = asset('js/contentsHours.json');
        $month_records = $data->createDefaultRecord();
        $hours_per_date = $data->getStudyHoursPerDate();
        $today_hours = $data->getTodayStudyHours();
        $month_hours = $data->getMonthStudyHours();
        $total_hours = $data->getTotalStudyHours();

        $languages_hours = $data->getStudyHoursPerLanguages();
        $contents_hours = $data->getHoursPerContents();
        return view('user/index', compact('url1', 'url2', 'url3', 'month_records', 'hours_per_date', 'today_hours', 'month_hours', 'total_hours'));
    }

    public function add() {
        $data = new Study;
        $today_hours = $data->getTodayStudyHours();
        $month_hours = $data->getMonthStudyHours();
        $total_hours = $data->getTotalStudyHours();
        return view('user/study_record', compact('today_hours', 'month_hours', 'total_hours'));
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

        //元々挿入されているレコードを削除
        Study::where('study_date', $request->datepicker)->where('study_hours', 0)->delete();

        $contents_number = count($contents_data);
        $languages_number = count($languages_data);
        // DBに値を挿入
        for ($i = 0; $i < count($contents_data); $i++) {
            for ($j = 0; $j < count($languages_data); $j++) {
                $param = [
                    'study_date' => $request->datepicker,
                    'study_contents' => implode($contents_data[$i]),
                    'study_languages' => implode($languages_data[$j]),
                    'study_hours' => $request->hours / ($contents_number * $languages_number),
                    'post_id' => $request->input('post_id'),
                ];
                Study::insert($param);
            }
        }
        return redirect('/');
    }
}
