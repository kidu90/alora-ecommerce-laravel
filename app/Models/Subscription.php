<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'name',
        'description',
        'price',
        'duration_months',
        'is_custom_box'
    ];

    protected $casts = [
        'is_custom_box' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function customerSubscriptions()
    {
        return $this->hasMany(CustomerSubscription::class);
    }
}