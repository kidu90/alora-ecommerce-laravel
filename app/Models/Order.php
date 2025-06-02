<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'total_amount',
        'tax_amount',
        'shipping_amount',
        'payment_method',
        'payment_status',
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_postal_code',
        'shipping_country',
        'notes',
        'shipped_at',
        'delivered_at'
    ];

    protected $casts = [
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber()
    {
        do {
            $orderNumber = 'ALR-' . date('Y') . '-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        } while (self::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }
}