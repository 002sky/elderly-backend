<?php

namespace App\Http\Controllers;

use App\Models\medication;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicationController extends Controller
{
    public function getMedication()
    {
        $data = [];

        $medication = DB::table('medications')->get();

        foreach ($medication as $medica) {
            $data[] = [
                'id' => $medica->id,
                'medicationName' => $medica->medicationName,
                'type' => $medica->type,
                'description' => $medica->description,
                'expireDate' => $medica->expireDate,
                'manufactureDate' => $medica->manufactureDate,
                'quantity' => $medica->quantity,
                'elderlyID' => $medica->elderlyID,
            ];
        };

        return response()->json(

            [$data]

        );
    }

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
                'manufactureDate' => $input['manufactureDate'],
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
}
