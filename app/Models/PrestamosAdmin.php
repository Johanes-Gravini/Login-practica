<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrestamosAdmin extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'prestamos_request_id',
        'balance',
        'maturity',
        'payments',
        'entrydate',
        'salary',
        'date',
        'responsible_report',
        'payment_status',
        'signature',
        'approved_amount',
        'payment_frequency',
        'from',
        'new_discounts',
        'comfenalco_mensual',
        'comfenalco_saldo',
        'combarranquilla_mensual',
        'combarranquilla_saldo',
        'otros_mensual',
        'otros_saldo',
        'input_approved',
        'date_approved',
    ];

    /**
     * Definir la relación inversa con Prestamo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prestamo(): BelongsTo
    {
        return $this->belongsTo(Prestamo::class, 'prestamos_request_id');
    }
}
