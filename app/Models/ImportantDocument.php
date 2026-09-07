<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'tread_licence',
        'tin_certificate',
        'bin_certificate',
        'company_pad_doc',
        'company_domain_renew_invoice',
        'old_tread_licence_multiple',
        'vat_certificate_multiple',
        'tin_return_certificate_multiple',
        'long_details',

    ];

    protected $casts = [
        'old_tread_licence_multiple' => 'array',
        'vat_certificate_multiple' => 'array',
        'tin_return_certificate_multiple' => 'array',
    ];
}
