<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyCandidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'address',
        'join_type',
        'expected_salary',
        'cv_or_resume',
        'github_link',
        'linkedin_link',
        'portfolio_link',
    ];
}
