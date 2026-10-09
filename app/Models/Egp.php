<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egp extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tender_id',
        'start_date',
        'end_date',
        'security_amount',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'security_amount' => 'decimal:2',
    ];
}
