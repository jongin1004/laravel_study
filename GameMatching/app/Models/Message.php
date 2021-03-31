<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    //제외할 필드를 적는다. 
    protected $fillable = ['from', 'to', 'text'];
}
