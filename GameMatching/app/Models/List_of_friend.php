<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_of_friend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'friend_id'];

    public function friend() 
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
