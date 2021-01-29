<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // 데이터를 넣을 수 있는 필드를 제한 하는 것이다. 
    //title, body 필드에만 데이터를 넣고 나머지는 건들이지 않겠다. 
    protected $fillable = ['title', 'body'];
    //quarded 해당 필드만 넣지않겠다고 제한하는 것 
    // title을 뺴고 넣겠다.
    // protected $quarded = ['title']
}
