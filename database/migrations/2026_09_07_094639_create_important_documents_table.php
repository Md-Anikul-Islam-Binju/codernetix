<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('important_documents', function (Blueprint $table) {
            $table->id();
            $table->string('tread_licence')->nullable();
            $table->string('tin_certificate')->nullable();
            $table->string('bin_certificate')->nullable();
            $table->string('company_pad_doc')->nullable();
            $table->string('company_domain_renew_invoice')->nullable();

            $table->json('old_tread_licence_multiple')->nullable();
            $table->json('vat_certificate_multiple')->nullable();
            $table->json('tin_return_certificate_multiple')->nullable();

            $table->longText('long_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('important_documents');
    }
};
