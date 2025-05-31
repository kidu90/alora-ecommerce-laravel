<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['plan_id', 'name', 'description', 'price', 'duration_months', 'is_custom_box'];

    public function customerSubscriptions()
    {
        return $this->hasMany(CustomerSubscription::class);
    }
}
