<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageReloadLog extends Model
{
    use HasFactory;
    protected $fillable = ['page_url', 'reloaded_at'];
    protected $casts = [
        'reloaded_at' => 'datetime', // <-- Cast it to Carbon
    ];
}
