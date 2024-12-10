<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'principal_amount',
        'weekly_interest',
        'weekly_installment',
        'weekly_payment',
        'penalty_rate',
        'next_payment_due',
        'total_due',
    ];

    protected $casts = [
        'next_payment_due' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Onboardedclients::class);
    }

    // Calculate the total amount due after penalties
    public function calculateDueAmount()
    {
        $dueAmount = $this->amount + $this->penalty_total;
        return $dueAmount;
    }

    //Loan schedule
    public function loanschedule()
    {
        return $this->hasMany(PaymentSchedule::class);
    }
    // Calculate the penalty for missed payments
    public function calculatePenalty($daysLate)
    {
        // Apply penalty only if the client is late in making the payment
        if ($daysLate > 0) {
            $penalty = $this->weekly_payment * $this->penalty_rate * $daysLate;
            return $penalty;
        }

        return 0;
    }
}
