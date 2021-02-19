<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['pro_tag', 'pro_state', 'pro_price', 'pro_title', 'pro_explan', 'user_id'];

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function productCart()
    {
        return $this->hasMany(productCart::class);
    }

}
