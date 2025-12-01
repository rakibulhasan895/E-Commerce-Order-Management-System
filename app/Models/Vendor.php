<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vendor extends Model
{
    protected $fillable = ['user_id', 'shop_name', 'shop_slug', 'shop_logo', 'address', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateSlug($shop_name)
    {
        $slug = Str::slug($shop_name);

        $count = static::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
