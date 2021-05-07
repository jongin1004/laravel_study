<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\List_of_bookmark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{    
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body', 'number_of_recommend'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function List_of_bookmark()
    {
        return $this->hasMany(List_of_bookmark::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
}
