<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request_friend extends Model
{
    use HasFactory;

    //타임스테프가 자동으로 저장되는 것을 사용하지 않겠다.
    public $timestamps = false;

    protected $fillable = ['from', 'to'];

    public function from()
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
