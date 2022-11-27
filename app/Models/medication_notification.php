<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medication_notification extends Model
{
    use HasFactory;
    protected $fillable = ['medicationID','time_status'];

    protected $cast = [
        'time_status' => 'array',
    ];
}
