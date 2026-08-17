<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'item_name',
        'quantity',
        'price',
        'prep_time_seconds',
    ];

    /**
     * Relationship back to the Order model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}