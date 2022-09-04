<?php

namespace App\Http\Controllers;

use App\Models\elderlyProfile;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ElderlyProfileController extends Controller
{
    public function createElderlyProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'DOB' =>  'required|before:today',
            'gender' => 'required',
            'roomID' => 'required',
            'bedNo' => 'required',
            'erID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),

            ], 401);
        }


        // if (Auth::user()->status == 'is_Admin') {
        $input = $request->all();
        $profile = elderlyProfile::create(

            [
                'name' => $input['name'],
                'DOB' => $input['DOB'],
                'gender' => $input['gender'],
                'bedNo' => $input['bedNo'],
                'roomID' => $input['roomID'],
                'descrition' => $input['descrition'],
                'erID' => $input['erID'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'create successful',
        ]);
        // } else {
        //     return response()->json(
        //         ['success' => false, 
        //         'message' => 'You are not an Admin']
        //     );
        // }
    }

    public function viewElderlyProfile()
    {
        $data= [];
        $viewProfile = DB::table('elderly_profiles')->get();
        // $view = $viewProfile->toArray();
        
        foreach($viewProfile as $vp){
            $data[] = [
                'name' => $vp->name,
                'DOB' => $vp->DOB,
                'gender' => $vp->gender,
                'bedNo' => $vp->bedNo,
                'roomID' => $vp->roomID,
                'descrition' => $vp->descrition,
                'erID' => $vp->erID,
            ];
        };

        return response()->json(
            [$data]
        );
    }
}
