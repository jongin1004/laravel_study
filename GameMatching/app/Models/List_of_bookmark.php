<?php

namespace App\Models;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class List_of_bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'forum_id'];

    public function User()
    {
        return $this -> belongsTo(User::class);
    }

    public function Forum()
    {
        return $this -> belongsTo(Forum::class);
    }

}
