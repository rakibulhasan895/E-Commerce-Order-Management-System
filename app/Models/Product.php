<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'vendor_id', 'name', 'slug', 'description', 'base_price', 'status', 'low_stock_threshold'
    ];
    public function vendor() 
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function variants() 
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images() 
    {
        return $this->hasMany(ProductImage::class);
    }

    public function inventory() 
    {
        return $this->hasOne(Inventory::class);
    }
}