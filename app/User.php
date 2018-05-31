<?php

namespace App;

use App\Models\Event;
use App\Models\Review;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }


    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_tag');
    }
}
