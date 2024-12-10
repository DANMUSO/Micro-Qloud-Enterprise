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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->decimal('amount', 10, 2); // The loan amount
            $table->decimal('penalty_rate', 5, 2)->default(0.05); // Penalty rate (e.g., 5%)
            $table->decimal('total_due', 10, 2);
            $table->integer('payment_schedule_weeks')->default(3); // Number of weeks for the payment schedule
            $table->decimal('weekly_payment', 10, 2);
            $table->decimal('penalty_total', 10, 2)->default(0); // Total penalty for late payments
            $table->timestamp('next_payment_due')->nullable();
            $table->enum('status', ['pending', 'approved', 'paid'])->default('pending');
            $table->timestamps();
    
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
