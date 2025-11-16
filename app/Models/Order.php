<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'customer_id', 'vendor_id', 'invoice_no', 'status', 'subtotal', 'discount', 'tax', 'total'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function vendor() 
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function items() 
    {
        return $this->hasMany(OrderItem::class);
    }

    public function status() 
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function invoice() 
    {
        return $this->hasOne(Invoice::class);
    }
}
