<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['user_id', 'shop_name', 'shop_slug', 'shop_logo', 'address', 'phone'];
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
