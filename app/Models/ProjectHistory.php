<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'project_name',
        'project_type',
        'project_document',
        'project_complete_duration',
        'project_budget',
        'project_amount_paid',
        'project_due',
        'project_start_date',
        'project_end_date',
        'client_name',
        'client_email',
        'client_phone',
        'client_address',
    ];
}
