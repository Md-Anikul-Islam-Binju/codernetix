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
        Schema::create('egps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('tender_id')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('security_amount', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egps');
    }
};
