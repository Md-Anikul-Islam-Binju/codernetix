<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'project_budget',
        'project_amount_paid',
        'project_due',
        'payment_date',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectHistory::class, 'project_id');
    }
}
