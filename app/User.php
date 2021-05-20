<?php

namespace App;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    /**
     * Return the logged in user
     *
     * @return \App\User
     */
    public static function loggedIn()
    {
        return (new static)->findOrFail(Auth::id());
    }

    /**
     * Set the default website language
     * for the acual user
     *
     * @param string $language The language code
     *
     * @return void
     */
    public static function setLanguage(string $language)
    {
        if (Auth::check()) {
            $user = self::loggedIn();
            $user->language = $language;
            $user->save();
        }
    }
}
