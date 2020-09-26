<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @author Christian la Forgia <christian@optiroot.it>
 */
class User extends Authenticatable implements MustVerifyEmail
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

    /**
     * Check if the current user is an Admin.
     *
     * @return bool
     */
    public static function isAdmin()
    {
        if (! auth()->user()) {
            return false;
        }

        if (auth()->user()->role == 'admin') {
            return true;
        }

        return false;
    }

    public function urls()
    {
        return $this->hasMany('App\Url', 'user_id', 'id');
    }
}
