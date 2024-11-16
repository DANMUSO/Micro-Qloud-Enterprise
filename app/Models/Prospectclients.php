<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospectclients extends Model
{
    use HasFactory;
    // Define the table name if it differs from the model name (Laravel uses plural form by default)
    protected $table = 'prospectclients';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name', 'phone', 'email', 'employer_name', 'address'
    ];
}
