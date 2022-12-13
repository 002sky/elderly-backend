<?php

namespace App\Console\Commands;

use App\Models\medication_notification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class updateDailySchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateDailySchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $input = medication_notification::all();

        foreach ($input as $object) {
            $TimeJson;
            $id;
            $time =[];
            $TimeJson = json_decode($object->time_status);
            $id = $object->id;


            foreach ($TimeJson as $TM) {
                $time[] = [
                    'time' => date("H:i:s", strtotime($TM->Time)),
                ];
            }

            foreach( $time as $t){
                DB::table('daily_schedules')->insert(
                    [
                        'taskName' => 'Medication',
                        'time' => date("H:i:s", strtotime($t['time'])),
                        'date' => Carbon::today()->format('y-m-d'),
                        'status' => false,
                        'MedicationTimeID' => $id,
                        'details' => json_encode(['dose']),
                    ]
                );
            }


        }




        $this->info('succee');


        // print('hello');

    }
}
