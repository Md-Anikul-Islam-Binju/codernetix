<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackedPage extends Model
{
    use HasFactory;

    protected $fillable = ['page_url', 'is_active'];
}
