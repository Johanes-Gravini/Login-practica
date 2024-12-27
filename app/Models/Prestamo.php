<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Schema;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prestamo extends Model
{
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

     /**
     * Definir la relación uno a muchos con PrestamoAdmin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admin(): HasOne
    {
        return $this->hasOne(PrestamosAdmin::class, 'prestamos_request_id'); // Cambia esto a prestamo_id
    }
}
