<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
