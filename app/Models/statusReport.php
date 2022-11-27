<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report',
        'writtenTime',
        'elderlyID',
    ];

    public $timestamps = false;
}
