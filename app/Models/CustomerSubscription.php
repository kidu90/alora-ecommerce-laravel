<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'user_id',
        'plan_id',
        'start_date',
        'next_delivery_date',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'next_delivery_date' => 'date',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}