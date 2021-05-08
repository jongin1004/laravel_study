<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Additional_comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id', 'body'];

    public function Comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
