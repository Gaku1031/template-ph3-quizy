<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Study;
use Carbon\CarbonPeriod;

use function PHPUnit\Framework\isEmpty;

class NullToZero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hoursBatch:nullToZero';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '学習時間のnullを0に変換する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $from = date('Y-m-01');
        $to = date('Y-m-t');
        //1ヶ月分の日付を取得
        $period = CarbonPeriod::create($from, $to)->toArray();
        foreach ($period as $key => $date) {
            $dates[] = $date->format('Y-m-d');
        }

        $today_record = Study::where('study_date', today()->format('Y-m-d'))->get();

        if (isEmpty($today_record)) {
            $param = [
                'study_hours' => 0,
                'study_date' => today(),
                'post_id' => 1,
            ];
            Study::insert($param);
        }
    }
}
