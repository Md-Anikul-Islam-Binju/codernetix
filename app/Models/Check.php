<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'assign_id',
        'complete_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assign_id');
    }



}
