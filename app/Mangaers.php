<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Mangaers extends Authenticatable
{
    use Notifiable;
    
	protected  $table   = 'mangaers';

    protected $fillable = [
        'name', 'email', 'password','image','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
