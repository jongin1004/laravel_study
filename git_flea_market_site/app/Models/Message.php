<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['to', 'from' , 'text'];


    //from or to 를 하게되면 User와 연동이 되어있기 때문에  User의 정보도 같이 가져온다. 
    public function from()
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to');
    }    
}
