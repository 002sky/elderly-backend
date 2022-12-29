<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MessageBox;
use App\Models\User;
use Illuminate\Http\Request;

class messageBoxController extends Controller
{
    public function sendMessage(Request $request)
    {

        $newMessage = MessageBox::create([
            'sender_ID' => $request->senderID,
            'receiver_ID' => $request->receiverID,
            'message' => $request->message,
        ]);

        if ($newMessage->exists) {
            return response()->json(
                [
                    'success' => true,
                ]
            );
        }
    }

    public function getAllMessage(Request $request)
    {

        $messages = MessageBox::where('sender_id', $request->senderID)
            ->where('receiver_id', $request->receiverID)
            ->orWhere('sender_id', $request->receiverID)
            ->where('receiver_id', $request->senderID)
            ->with('sender', 'receiver')
            ->get();

        foreach ($messages as $messages) {

            $JsonMessage[] = [
                'senderID' => $messages->sender->id,
                'receiverID' => $messages->receiver->id,
                'message' => $messages->message,
            ];
        }

        if (!empty($JsonMessage)) {
            return response()->json(
                [$JsonMessage]
            );
        }
    }


    public function getAllReceiver(Request $request)
    {

        if ($request->userType == false) {
            $receiverList = DB::table('users')->where('status', '=', 'is_admin')->select('id', 'name')->get();
        } else {
            $receiverList = DB::table('users')->where('status', '=', 'Relative')->select('id', 'name')->get();
        }
        return response()->json(

            $receiverList
        );
    }
}
