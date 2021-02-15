<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'text_type'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}
