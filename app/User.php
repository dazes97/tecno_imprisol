<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'color','root'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isRoot()
    {
        if ($this->root == '1') {
            return true;
        }
        return false;
    }

    public function isAdministrative()
    {
        if (DB::table('administratives')->where('id', $this->id)->exists()) {
            return true;
        }
        return false;
    }
    public function isClient()
    {
        if (DB::table('clients')->where('id', $this->id)->exists()) {
            return true;
        }
        return false;
    }
    public function isProvider()
    {
        if (DB::table('providers')->where('id', $this->id)->exists()) {
            return true;
        }
        return false;
    }




}
