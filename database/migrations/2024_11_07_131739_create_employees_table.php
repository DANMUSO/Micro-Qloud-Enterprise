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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Employee name
            $table->string('email')->unique(); // Employee email (unique)
            $table->string('phone_no'); // Employee phone number
            $table->decimal('amount', 10, 2); // Employee amount (e.g., salary or payment) add companies_id
            $table->integer('company_id');
            $table->tinyInteger('status')->default(0); // Employee status, default 0 (inactive or not approved)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
