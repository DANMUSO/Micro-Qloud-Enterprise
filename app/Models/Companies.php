<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = ['company_name', 'email', 'phone', 'payroll_date', 'staff_count'];
    public function staff()
    {
        return $this->hasMany(Employees::class, 'company_id');
    }
  
}
