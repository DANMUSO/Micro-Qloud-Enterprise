<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onboardedclients extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'location',
        'shop_name',
        'photo',
        'permit',
        'status',
        'id_photos',
    ];

    protected $casts = [
        'id_photos' => 'array',
    ];
    public function loans()
    {
        return $this->hasMany(Loan::class , 'client_id');
    }
}
