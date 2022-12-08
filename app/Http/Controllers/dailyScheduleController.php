<?php

namespace App\Http\Controllers;

use App\Models\daily_schedule;
use App\Models\medication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class dailyScheduleController extends Controller
{
    public function scheduleWithin6Hour()
    {

        //  $data = daily_schedule::whereBetween('time',[Carbon::now()->hour()->format('H:i:s'),Carbon::now()->hour()->addHour(2)->format('H:i:s')])->get();
        $data = daily_schedule::all()->where('date', '=', Carbon::today());
        $timeArr = [];

        foreach ($data as $time) {
            $timeArr[] =
                [
                    'time' => $time['time'],
                    'taskName' => $time['taskName'],
                ];
        }

        $arry = array_unique($timeArr, SORT_REGULAR);

        return response()->json([

            $arry,

        ]);
    }


    public function taskDetail(Request $request)
    {

        $selctedTime = DB::table("daily_schedules")->where('taskName', '=', $request['taskName'])->where('time', '=', $request['time'])->where('date','=',Carbon::today())->join('medication_notifications', 'medication_notifications.id', '=', 'daily_schedules.MedicationTimeID')->join('medications', 'medications.id', '=', 'medication_notifications.medicationID')->join('elderly_profiles', 'elderly_profiles.id', '=', 'medications.elderlyID')->select('taskname', 'medicationName', 'details', 'type', 'elderlyID', 'name', 'time','daily_schedules.id','status')->get();

        $array = [];

        foreach ($selctedTime as $data) {
            if (count($array) == 0) {
                $array[] = [

                    'name' => $data->name,
                    'time' => $data->time,
                    'medication' => [
                        'id' => $data->id,
                        'medicationName' => $data->medicationName,
                        'status' => $data->status,
                        'type' => $data->type,
                    ]
                ];
            } else if (count($array) > 0) {
                $count = 0;
                $name = $data->name;
                if ($array[$count]['name'] == $name) {

                    $detail[] = $array[$count]['medication'];
 
                    $addDetail = [
                        'id' => $data->id,
                        'medicationName' => $data->medicationName,
                        'status' => $data->status,
                        'type' => $data->type,
                    ];

                    array_push($detail, $addDetail);

                    $array[$count] = [
                        'name' => $array[$count]['name'],
                        'time' => $array[$count]['time'],
                        'medication' => $detail,
                    ];
                    $count++;

                } else {
                    $array[] = [
                        'name' => $data->name,
                        'time' => $data->time,
                        'medication' => [
                            'id' => $data->id,
                            'medicationName' => $data->medicationName,
                            'status' => $data->status,
                            'type' => $data->type,
                        ]
                    ];
                }

            }

        }
        return response()->json([
            $array,
        ]);
    }


    public function updateScheduleStatus(Request $request){

        $input = $request->all();

        try{
            $scheduleUpdate = DB::table('daily_schedules')->where('id','=',$input['id'])->update(['status' => true]);
            if($scheduleUpdate > 0){
                return response()->json(
                    ['success' => true,
                    'message' => "status update success",
                    ]
                );
            }

        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(
                ['success' => false,
                'message' => "status update failed",
                ]
            );
        }
    
        
    }
}
