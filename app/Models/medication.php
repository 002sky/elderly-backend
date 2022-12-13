<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicationName',
        'type',
        'description',
        'expireDate',
        'dose',
        'image',
        'quantity',
        'elderlyID',
        
    ];

    public $timestamps = false;
}
