<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use willvincent\Rateable\Rateable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use willvincent\Rateable\Rating;
//use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable, Rateable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasAnyRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function socialProviders(){
        return $this->hasMany('App\SocialProvider');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }


    public function userReviews(){
        return $this->hasOne(Rating::class);
    }

    // public function bookings(){
    //     return $this->hasMany('App\Booking');
    // }

    public function messages(){
        return $this->hasMany('App\Message');
    }



     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendsOf()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendsOfMine->merge($this->friendsOf);
    }


    public function bookingsOfMine()
    {
        return $this->belongsToMany('App\User', 'bookings', 'user_id', 'vendor_id');
    }

    public function bookingsOf()
    {
        return $this->belongsToMany('App\User', 'bookings', 'vendor_id', 'user_id');
    }

    public function bookings()
    {
        return $this->bookingsOfMine->merge($this->bookingsOf);
    }


}
