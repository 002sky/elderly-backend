<?php

namespace App\Http\Controllers;

use App\Models\elderlyProfile;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\String\ByteString;

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
                'descrition' => 'descrition',
                'elderlyImage' => $input['elderlyImage'],
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
        $data = [];
        $viewProfile = DB::table('elderly_profiles')->get();
        // $view = $viewProfile->toArray();
        
        foreach($viewProfile as $vp){
            $data[] = [
                'id' => $vp->id,
                'name' => $vp->name,
                'DOB' => $vp->DOB,
                'gender' => $vp->gender,
                'bedNo' => $vp->bedNo,
                'roomID' => $vp->roomID,
                'descrition' => $vp->descrition,
                'elderlyImage'=> $vp->elderlyImage,
                'erID' => $vp->erID,
            ];
        };
        return response()->json(
            [$data]
        );
    }

    public function viewElderlyProfileByID(String $id){

        $data = [];
        $viewProfile = elderlyProfile::find($id);

        $data = [
            'id' => $viewProfile->id,
            'name' => $viewProfile->name,
            'DOB' => $viewProfile->DOB,
            'gender' => $viewProfile->gender,
            'bedNo' => $viewProfile->bedNo,
            'roomID' => $viewProfile->roomID,
            'descrition' => $viewProfile->descrition,
            'erID' => $viewProfile->erID,
        ];

        return response()->json(
            [$data]
        );


    }


    public function editElderlyProfile(Request $request)
    {
        $profile = elderlyProfile::find($request->id);
        
        try{
            $profile->name = $request->name;
            $profile->DOB = $request->DOB;
            $profile->gender = $request->gender;
            $profile->roomID = $request->roomID;
            $profile->bedNo= $request-> bedNo;
            $profile->descrition= $request-> descrition;
            $profile->elderImage= $request-> elderImage;
            $profile->erID = $request-> erID;
            $profile->save();
        }catch(e){
            return response()->json([
                'success' => false,
                'message' => 'Update Faile',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Edits successful',
        ]);


    }
}
