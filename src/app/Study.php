<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonPeriod;

use function PHPUnit\Framework\isEmpty;

class Study extends Model
{
    protected $table = 'study';
    protected $fillable = ['study_date', 'study_contents', 'study_languages', 'study_hours', 'post_id', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getTodayStudyHours() {
        $today_hours = Study::where('study_date', today()->format('Y-m-d'))->sum("study_hours");
        return $today_hours;
    }

    public function getMonthStudyHours() {
        //今月の学習時間の合計を取得
        $from = date('Y-m-01');
        $to = date('Y-m-t');
        $month_hours = Study::whereBetween('study_date', [$from, $to])->sum("study_hours");
        return $month_hours;
    }

    public function getTotalStudyHours() {
        //全ての合計を取得
        $total_hours = Study::sum("study_hours");
        return $total_hours;
    }

    public function getStudyHoursPerDate() {
        $from = date('Y-m-01');
        $to = date('Y-m-t');
        //1ヶ月分の日付を取得
        $period = CarbonPeriod::create($from, $to)->toArray();
        foreach ($period as $key => $date) {
            $dates[] = $date->format('Y-m-d');
        }

        $month_hours_per_date = Study::selectRaw('study_date')
                                ->selectRaw('sum(study_hours)')
                                ->groupBy('study_date')
                                ->get()
                                ->whereBetween('study_date', [$from, $to])
                                ->sortBy('study_date')
                                ->toArray();
        $result = [];
        foreach ($month_hours_per_date as $key => $val) {
            $result[] = $val['sum(study_hours)'];
        }

        //月ごとの合計学習時間をjsonファイルに落とし込む
        $json =  json_encode($result);
        $filename1 = '../public/js/hours.json';
        file_put_contents($filename1, $json);
        return $json;
    }

    public function getStudyHoursPerLanguages() {
        $from = date('Y-m-01');
        $to = date('Y-m-t');

        $html = Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'HTML')->sum("study_hours");
        $css = Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'CSS')->sum("study_hours");
        $javascript = Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'JavaScript')->sum("study_hours");
        $php = Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'PHP')->sum("study_hours");
        $laravel = Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'Laravel')->sum("study_hours");
        $sql =  Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'SQL')->sum("study_hours");
        $shell = Study::whereBetween('study_date', [$from, $to])->where('study_languages', 'SHELL')->sum("study_hours");
        $others = Study::whereBetween('study_date', [$from, $to])->where('study_languages', '情報システム基礎知識(その他)')->sum("study_hours");
        $month_hours = Study::whereBetween('study_date', [$from, $to])->sum("study_hours");

        if($month_hours !== 0) {
            $html_ratio = round(($html / $month_hours) * 100);
            $css_ratio = round(($css / $month_hours) * 100);
            $javascript_ratio = round(($javascript / $month_hours) * 100);
            $php_ratio = round(($php / $month_hours) * 100);
            $laravel_ratio = round(($laravel / $month_hours) * 100);
            $sql_ratio = round(($sql / $month_hours) * 100);
            $shell_ratio = round(($shell / $month_hours) * 100);
            $others_ratio = round(($others / $month_hours) * 100);
        } else {
            $html_ratio = 0;
            $css_ratio = 0;
            $javascript_ratio = 0;
            $php_ratio = 0;
            $laravel_ratio = 0;
            $sql_ratio = 0;
            $shell_ratio = 0;
            $others_ratio = 0;
        }


        $languages_hours = [$html_ratio, $css_ratio, $javascript_ratio, $php_ratio, $laravel_ratio, $sql_ratio, $shell_ratio, $others_ratio];
        $languages_array =  json_encode($languages_hours);
        $filename2 = '../public/js/languagesHours.json';
        file_put_contents($filename2, $languages_array);
        return $languages_array;
    }

    public function getHoursPerContents() {

        $from = date('Y-m-01');
        $to = date('Y-m-t');

        $D_hours = Study::whereBetween('study_date', [$from, $to])->where('study_contents', 'ドットインストール')->sum("study_hours");
        $N_hours = Study::whereBetween('study_date', [$from, $to])->where('study_contents', 'N予備校')->sum("study_hours");
        $P_hours = Study::whereBetween('study_date', [$from, $to])->where('study_contents', 'POSSE課題')->sum("study_hours");
        $month_hours = Study::whereBetween('study_date', [$from, $to])->sum("study_hours");

        if ($month_hours !== 0) {
            $D_ratio = round(($D_hours / $month_hours) * 100);
            $N_ratio = round(($N_hours / $month_hours) * 100);
            $P_ratio = round(($P_hours / $month_hours) * 100);
        } else {
            $D_ratio = 0;
            $N_ratio = 0;
            $P_ratio = 0;
        }
        

        //取得した３つの数字を配列にする
        $contents_hours = [$D_ratio, $N_ratio, $P_ratio];
        $contents_array =  json_encode($contents_hours);
        $filename3 = '../public/js/contentsHours.json';
        file_put_contents($filename3, $contents_array);
        return $contents_array;
    }

    public function createDefaultRecord() {
        $from = date('Y-m-01');
        $to = date('Y-m-t');
        //1ヶ月分の日付を取得
        $period = CarbonPeriod::create($from, $to)->toArray();
        foreach ($period as $key => $date) {
            $dates[] = $date->format('Y-m-d');
        }

        $month_end_record = Study::where('study_date', $to)->get();

        if ($month_end_record->isEmpty()) {
            for ($i=0; $i<count($dates); $i++) {
                $param = [
                    'study_hours' => 0,
                    'study_date' => $dates[$i],
                    'post_id' => 1,
                ];
                Study::insert($param);
            }
        }
    }
}
