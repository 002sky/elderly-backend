<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'reason', 'date', 'time', 'userID'];

    public function userInfor()
    {
        return $this->belongsTo(User::class, 'userID','id');
    }


}
