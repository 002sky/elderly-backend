<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class elderlyProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'DOB',
        'gender',
        'roomID',
        'bedNo',
        'descrition',
        'erID',
    ];

    public $timestamps = false;
}
