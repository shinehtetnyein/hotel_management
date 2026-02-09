<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'currency',
        'payer_name',
        'payer_email',
        'payment_status',
        'payment_method',
        'amount'
    ];
}
