<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportStatus extends Model
{
    use HasFactory;

    protected $fillable = ['reportStatus','elderlyID'];
}
