<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
         'email', 'password', 'color','font_size','root','role_id'
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

    public function getStrRandom($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function isSelled($id)
    {
        $sale = Sale::where('order_id',$id);
        if($sale == null)
        {
            return false;
        }
        return true;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'privileges', 'case_use_id', 'role_id');
    }




}
