<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function owns(Task $task)
    {
        return auth()->id() == $task-> user_id;
    }

    public function tasks()
    {   
        #유저는 많은 task를 가진다. 
        return $this->hasMany(Task::class); //$this는 User(Class)를 의미 
    }

    public function qna()
    {   
        #유저는 많은 task를 가진다. 
        return $this->hasMany(Qna::class); //$this는 User(Class)를 의미 
    }

    public function Qnaowns(Qna $qna)
    {
        return auth()->id() == $qna-> user_id;
    }
}
