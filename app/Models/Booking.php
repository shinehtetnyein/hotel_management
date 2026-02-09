<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'first_name',
        'last_name',
        'ph_no',
        'email',
        'check_in',
        'check_out',
        'guest',
        'status',
        'price'
    ];
}
