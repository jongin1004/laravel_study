<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['pro_tag', 'pro_state', 'pro_price', 'pro_title', 'pro_explan', 'user_seq'];
}
