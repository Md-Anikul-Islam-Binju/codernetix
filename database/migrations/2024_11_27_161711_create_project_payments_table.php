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
        Schema::create('project_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // Assuming a foreign key to projects table
            $table->decimal('project_budget', 15, 2); // Adjust precision as needed
            $table->decimal('project_amount_paid', 15, 2);
            $table->decimal('project_due', 15, 2);
            $table->date('payment_date');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_payments');
    }
};
