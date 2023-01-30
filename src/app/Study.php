<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonPeriod;

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
        // dd($dates);
        
        // $month_hours_per_date = Study::whereYear('study_date', date('Y'))
        //                         ->whereMonth('study_date', date('m'))
        //                         ->orderBy('study_date')
        //                         ->get()
        //                         ->groupBy('study_date')
        //                         ->map(function ($day) {
        //                             return $day->groupBy('study_date')->sum('study_hours');
        //                         });

        $month_hours_per_date = Study::selectRaw('study_date')
                                ->selectRaw('sum(study_hours)')
                                ->groupBy('study_date')
                                ->get()
                                ->toArray();

        for ($i = 0; $i < count($month_hours_per_date); $i++) {
            print_r(array($month_hours_per_date[$i]["sum(study_hours)"]));
        }
    }
}
