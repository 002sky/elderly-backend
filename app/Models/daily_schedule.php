<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daily_schedule extends Model
{
    use HasFactory;

    protected $fillable = ['taskName','time','date','status','MedicationTimeID','details'];

    protected $cast = [
        'details' => 'array',
    ];
    
}
