<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check_to_recommend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'forum_id'];
}
