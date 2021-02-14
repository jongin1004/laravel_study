<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    // public function pro_seq()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
