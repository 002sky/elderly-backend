<?php

namespace App\Http\Controllers;

use App\Models\medication_notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medication_notification_controller extends Controller
{
    //

    public function setMedicationTiming(Request $request)
    {

        $input = $request->all();


        $medicationTiming = medication_notification::create(
            [
                'medicationID' => $input['elderlyID'],
                'time_status' => json_encode($input['time_status']),
            ]
        );

        $time = [];

        if ($medicationTiming->exists) {

            $TimeJson = $input['time_status'];

            foreach ($TimeJson as $TM) {
                $time[] = [
                    'time' => date("H:i:s", strtotime($TM['Time'])),
                ];
            }


            foreach ($time as $t) {
                DB::table('daily_schedules')->insert(
                    [
                        'taskName' => 'Medication',
                        'time' => date("H:i:s", strtotime( $t['time'])),
                        'date' => Carbon::today()->format('y-m-d'),
                        'status' => false,
                        'MedicationTimeID' => $medicationTiming->id,
                        'details' => json_encode(['dose']),
                    ]
                );
            }
        }


        if ($medicationTiming->exists) {
            return response()->json([
                'success' => true,
                'message' => 'Medication  timing created successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Medication create fail',
                'ID' => '123',
            ]);
        };
    }
    public function getMedicationTiming()
    {

        $data = [];

        $medicationTiming = DB::table('medication_notifications')->get();

        # get the medication timing data and return it back to the frontend 

        foreach ($medicationTiming as $MN) {
            $data[] = [
                'id' => $MN->medicationID,
                'time_status' => json_decode($MN->time_status),
            ];
        }


        return response()->json(
            [$data]
        );
    }
}
