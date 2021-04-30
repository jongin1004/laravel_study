<?php

namespace App\Models;

use App\Models\Letter;
use App\Models\Message;
use App\Models\Request_friend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'verification_code',
        'propensity',
        'experience_point',
        'rank'
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

    public function Forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function List_of_friends()
    {
        return $this->hasMany(List_of_friend::class);
    }

    public function Messages()
    {
        return $this->hasMany(Message::class);
    }

    public function Request()
    {
        return $this->hasMany(Request_friend::class, 'to');
    }

    public function Letters()
    {
        return $this->hasMany(Letter::class);
    }
}
