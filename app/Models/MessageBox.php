<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageBox extends Model
{
    use HasFactory;

   protected $fillable = ['sender_ID','receiver_ID','message'];

   public function sender()
   {
       return $this->belongsTo(User::class, 'sender_ID','id');
   }

   public function receiver()
   {
       return $this->belongsTo(User::class, 'receiver_ID','id');
   }

}
