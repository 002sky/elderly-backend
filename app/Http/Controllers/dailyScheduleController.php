<?php

namespace App\Http\Controllers;

use App\Models\daily_schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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

        $a = array_values($arry);

        return response()->json(

            [$a],

        );
    }


    public function taskDetail(Request $request)
    {

        //pull schedule detail based on date,
        $selctedTime = DB::table("daily_schedules")->where('taskName', '=', $request['taskName'])->where('time', '=', $request['time'])->where('date', '=', Carbon::today())->join('medication_notifications', 'medication_notifications.id', '=', 'daily_schedules.MedicationTimeID')->join('medications', 'medications.id', '=', 'medication_notifications.medicationID')->join('elderly_profiles', 'elderly_profiles.id', '=', 'medications.elderlyID')->select('taskname', 'medicationName', 'details', 'type', 'elderlyID', 'name', 'time', 'daily_schedules.id', 'status')->get();


        $array = [];

        //based on the data in array to add the medication 
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
                $name = $data->name;

                if(in_array($name,array_column($array,'name'))){
                     $index =  array_search($name,array_column($array,'name'));

                     $detail = [];
                     $detail[] = $array[$index]['medication'];

                     $addDetail = [
                         'id' => $data->id,
                         'medicationName' => $data->medicationName,
                         'status' => $data->status,
                         'type' => $data->type,
                     ];

                     if (isset($detail[0][0])) {

                         array_push($detail[0], $addDetail);

                         $detail = $detail[0];
                     } else {
                         array_push($detail, $addDetail);
                     }

                     $array[$index] = [
                         'name' => $array[$index]['name'],
                         'time' => $array[$index]['time'],
                         'medication' => $detail,
                     ];
                    
                }else{
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



    //update the status 
    public function updateScheduleStatus(Request $request)
    {

        $input = $request->all();

        try {
            $scheduleUpdate = DB::table('daily_schedules')->where('id', '=', $input['id'])->update(['status' => true]);
            if ($scheduleUpdate > 0) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => "status update success",
                    ]
                );
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "status update failed",
                ]
            );
        }
    }


    private  function findInArray($array, $key, $val)
    {
        foreach ($array as $item)
            if (isset($item[$key]) && $item[$key] == $val)
                return true;
        return false;
    }
}
