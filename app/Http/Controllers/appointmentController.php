<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class appointmentController extends Controller
{
    public function makeAppointment(Request $request)
    {
        $input = $request->all();

        $appointment = appointment::create(
            [
                'status' => null,
                'reason' => $input['reason'],
                'date' => $input['date'],
                'time' => date("H:i:s", strtotime($input['time'])),
                'userID' => $input['userID'],

            ]
        );

        if ($appointment->exists) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Appintment Request has been send',
                ]

            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Appiontment Request failed',
                ]

            );
        }
    }

    public function approvalAppointment(Request $request)
    {

        $appointment = appointment::find($request->id);

        try {
            $appointment->status = true;


            if ($appointment->save()) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Appiontment approval success',
                    ]

                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Appiontment approval failed',
                    ]

                );
            }
        } catch (e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Appiontment approval failed',
                ]

            );
        }
    }

    public function disapprovalAppointment(Request $request)
    {
        $appointment = appointment::find($request->id);

        try {
            $appointment->status = false;


            if ($appointment->save()) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Appiontment disapproval success',
                    ]

                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Appiontment disapproval failed',
                    ]

                );
            }
        } catch (e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Appiontment disapproval failed',
                ]

            );
        }
    }

    public function getAllApointmentRequest()
    {
        $allAppointment = Appointment::Where('status', '=', null)->with('userInfor')->get();

        foreach ($allAppointment as $ap) {
            $data[] = [
                'id' => $ap->id,
                'status' => $ap->status,
                'reason' => $ap->reason,
                'date' => $ap->date,
                'time' => $ap->time,
                'userID' => $ap->userID,
                'userName' => $ap->userInfor->name,
            ];
        };

        return response()->json(
            [$data]
        );
    }


    public function getAppointmentByID(Request $request)
    {
        $allAppointment = Appointment::Where('userID', '=', $request->id)->whereDate('updated_at', '>=', Carbon::now()->subDays(7))->with('userInfor')->get();

        foreach ($allAppointment as $ap) {
            $data[] = [
                'id' => $ap->id,
                'status' => $ap->status,
                'reason' => $ap->reason,
                'date' => $ap->date,
                'time' => $ap->time,
                'userID' => $ap->userID,
                'userName' => $ap->userInfor->name,
            ];
        };

        return response()->json(
            [$data]
        );
    }
}
