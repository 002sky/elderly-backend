<?php

namespace App\Http\Controllers;

use App\Models\schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class scheduleController extends Controller
{
    public function addSchedule(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'eventName' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'color_display' => 'required',
            'userID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();

        $schedule = schedule::create(
            [
                'eventName' => $input['eventName'],
                'start_time' => $input['start_time'],
                'end_time' => $input['end_time'],
                'color_display' => $input['color_display'],
                'userID' => $input['userID'],
            ]
        );
        if ($schedule->exists) {
            return response()->json([
                'success' => true,
                'message' => 'schedule created successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'schedule create fail',
            ]);
        };
    }


    public function getSchduleData(Request $request){
        $data =[];
        $schedule = DB::table('schedules')->where('userID',$request->userID)->get();
        // $schedule = DB::table('schedules')->get();

        foreach($schedule as $s){
            $data[] = [
                'eventName'=> $s->eventName,
                'start_time'=> $s->start_time,
                'end_time'=> $s->end_time,
                'color_display'=> $s->color_display,
                'userID'=> $s->userID,
            ];
        };

 
        return response()->json(
         [$data]
    
        );

    }
}
