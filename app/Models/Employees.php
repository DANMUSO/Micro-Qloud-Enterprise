<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    // Define which attributes can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'company_id',
        'amount',
        'status',
    ];

    // Optionally, if you want to cast the 'amount' to a specific format
    protected $casts = [
        'amount' => 'decimal:2',
    ];
      // Define the relationship: a staff member belongs to one company
      public function company()
      {
          return $this->belongsTo(Companies::class);
      }
       // Define the relationship
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
