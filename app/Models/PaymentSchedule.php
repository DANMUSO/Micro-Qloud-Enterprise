<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    use HasFactory;

    protected $table = 'payment_schedules';

    // Define the fields that are mass assignable
    protected $fillable = [
        'loan_id',  // Foreign key referring to the Loan model
        'week',
        'amount_due',
        'due_date',
        'status',
    ];
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

}
