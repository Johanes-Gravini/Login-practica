<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Schema;

class Prestamo extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'options',
        'name',
        'cc',
        'value',
        'discount',
        'purpose',
        'employee',
        'date',
    ];

    // Campos que son fechas
    protected $dates = ['date'];
}
