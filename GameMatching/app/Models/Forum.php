<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{    
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body', 'number_of_recommend'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
