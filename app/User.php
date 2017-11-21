<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    const VERIFIED_USER = '1';
    const NOT_VERIFIED_USER = '0';

    const NORMAL_USER = 'false';
    const ADMIN_USER = 'true';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'verification_token', 'admin',
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token',
    ];

    public function isVerified(){
        return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin(){
        return $this->admin == User::ADMIN_USER;
    }

    public static function generateVerificationToken(){
        return str_random(40);
    }



}
