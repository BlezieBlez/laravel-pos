<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'order_type',
        'table_number',
        'status',
        'subtotal',
        'discount',
        'total',
        'cash_tendered',
        'change_amount',
        'arrival_time',
        'preparation_start_time',
        'completion_time',
    ];

    /**
     * Relationship with OrderItem model.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}