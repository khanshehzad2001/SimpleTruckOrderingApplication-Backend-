<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'location',
        'destination',
        'no_of_trucks',
        'type_of_truck',
        'company_name',
        'cargo_type',
        'cargo_weight',
        'pickup_time',
        'delivery_time',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
