<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $fillable =[
        'eventName',
        'start_time',
        'end_time',
        'color_display',
        'userID',     
    ];
    
    public $timestamps = false;
}
