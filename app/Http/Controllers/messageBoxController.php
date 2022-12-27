<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\MessageBox;
use App\Models\User;
use Illuminate\Http\Request;

class messageBoxController extends Controller
{
    public function sendMessage(Request $request){

    }

    public function getAllMessage(Request $request){
        $recipientId = 2;
        $messages = MessageBox::where('receiver_ID', $recipientId)
            ->with('sender', 'receiver')
            ->get();
        
        foreach ($messages as $message) {

            echo $message->sender->name;
            echo $message->receiver->name;
        }
    }


    public function getAllReceiver(Request $request){

        if($request->userType == "true"){
            $receiverList = DB::table('users')->where('status','=','is_admin')->select('id','name')->get();
        }else{
            $receiverList = DB::table('users')->where('status','=','Relative')->select('id','name')->get();
        }


        return response()->json(

            $receiverList
        );

    }

}
