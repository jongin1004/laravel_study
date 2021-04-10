<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    //제외할 필드를 적는다. 
    protected $fillable = ['from', 'to', 'text'];

    public function from()
    {
        return $this->belongsTo(User::class, 'from');
    }
 
    public function to()
    {
        return $this->belongsTo(User::class, 'to');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'from');
    }
}
