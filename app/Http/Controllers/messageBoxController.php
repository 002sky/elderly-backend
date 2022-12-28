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
        $messages = MessageBox::where('receiver_ID', $recipientId)->orWhere('sender_ID', $recipientId)
            ->with('sender', 'receiver')
            ->get();
        
        foreach($messages as $messages){

            $JsonMessage[] = [
                'senderID' => $messages->sender->id,
                'receiverID' => $messages->receiver->id,
                'message' =>$messages->message,
            ];


        }



        return response()->json(
            [$JsonMessage]
        );

    }


    public function getAllReceiver(Request $request){

        if($request->userType == false){
            $receiverList = DB::table('users')->where('status','=','is_admin')->select('id','name')->get();
        }else{
            $receiverList = DB::table('users')->where('status','=','Relative')->select('id','name')->get();
        }
        return response()->json(

            $receiverList
        );

    }

}
