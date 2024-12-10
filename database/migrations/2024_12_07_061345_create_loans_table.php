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
            $table->integer('client_id'); // assuming client_id refers to the clients table
            $table->decimal('principal_amount', 10, 2); // The total loan amount
            $table->decimal('weekly_interest', 10, 2); // Weekly interest amount (6.25%)
            $table->decimal('weekly_installment', 10, 2); // Weekly installment (principal / weeks)
            $table->decimal('weekly_payment', 10, 2); // Total weekly payment (installment + interest)
            $table->decimal('penalty_rate', 5, 2); // Penalty rate (10%)
            $table->date('next_payment_due'); // The first payment due date
            $table->decimal('total_due', 10, 2); // Total due without penalties
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
