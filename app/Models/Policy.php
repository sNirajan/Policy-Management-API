<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory; // lets to easily create dummy data later


    // The table associated with the model
    protected $table = 'policies';

    // Mass assignable fields
    protected $fillable = [
        'policy_number',
        'customer_number',
        'premium_amount',
        'status',
    ];
}
