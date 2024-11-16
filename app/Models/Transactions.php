<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'employee_id',
        'amount',
        'payroll_date',
        'status',
    ];
    // Define the inverse relationship
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }
}
