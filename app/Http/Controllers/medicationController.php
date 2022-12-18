<?php

namespace App\Http\Controllers;

use App\Models\medication;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class medicationController extends Controller
{
    //get medication details from the databases
    public function getMedication()
    {
        $data = [];

        try {
            $medication = DB::table('medications')->leftJoin('medication_notifications', 'medications.id', '=', 'medication_notifications.medicationID')->select('medicationName', 'type', 'description', 'expireDate', 'dose', 'quantity', 'image', 'time_status', 'medications.id', 'elderlyID')->get();
            // $medication2 = DB::table('medications')->get();

            // $medicationUnion = $medication->union($medication2);

            foreach ($medication as $mdlist) {
                if (!empty($mdlist->time_status)) {
                    $data[] = [
                        'id' => $mdlist->id,
                        'medicationName' => $mdlist->medicationName,
                        'type' => $mdlist->type,
                        'description' => $mdlist->description,
                        'expireDate' => $mdlist->expireDate,
                        'dose' => $mdlist->dose,
                        'image' => $mdlist->image,
                        'quantity' => $mdlist->quantity,
                        'time' => json_decode($mdlist->time_status),
                        'elderlyID' => $mdlist->elderlyID,
                    ];
                } else {
                    $data[] = [

                        'id' => $mdlist->id,
                        'medicationName' => $mdlist->medicationName,
                        'type' => $mdlist->type,
                        'description' => $mdlist->description,
                        'expireDate' => $mdlist->expireDate,
                        'dose' => $mdlist->dose,
                        'image' => $mdlist->image,
                        'time' => null,
                        'quantity' => $mdlist->quantity,
                        'elderlyID' => $mdlist->elderlyID,
                    ];
                }
            }

            return response()->json(

                [$data]

            );
        } catch (e) {
        }
    }



    //add medication details 
    public function setMedication(Request $request)
    {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();

        $medication = medication::create(
            [
                'medicationName' => $input['medicationName'],
                'type' => $input['type'],
                'description' => $input['description'],
                'expireDate' => $input['expireDate'],
                'dose' => $input['dose'],
                'image' => $input['image'],
                'quantity' => $input['quantity'],
                'elderlyID' => $input['elderlyID'],
            ]
        );
        if ($medication->exists) {
            return response()->json([
                'success' => true,
                'message' => 'Medication created successful',
                'ID' => $medication->id,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Medication create fail',
                'ID' => '123',
            ]);
        };
    }

    //get the medication based on id
    public function getMedicationByID(Request $request)
    {

        $input = $request->all();

        $medicationByID = DB::table('medications')->where('elderlyID', '=', $input['id'])->join('medication_notifications', 'medications.id', '=', 'medication_notifications.medicationID')->select('medicationName', 'type', 'description', 'expireDate', 'manufactureDate', 'quantity', 'time_status', 'medications.id')->get();

        if ($medicationByID->count() > 0) {
            return response()->json(
                $medicationByID,
            );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'something went wrong',
            ]);
        }
    }



    public function updateMedication(Request $request)
    {
        $medication = medication::find($request->id);

        try {
            if ($request->image != null) {
                $medication->image = $request->image;
            }

            $medication->medicationName = $request->medicationName;
            $medication->type = $request->type;
            $medication->description = $request->description;
            $medication->dose = $request->dose;
            $medication->quantity = $request->quantity;
            $medication->elderlyID = $request->elderlyID;

            $medication->save();
        } catch (e) {
            return response()->json([
                'success' => false,
                'message' => 'Update Faile',
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Update successful',
        ]);
    }
}
