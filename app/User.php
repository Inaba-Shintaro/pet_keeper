<?php

namespace App;

use Eloquent;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Authenticatable
// class User extends Eloquent implements Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','image','area','host_experience','comment',
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


    public function pets() {//【RELATION】「User hasMany Pets」
        return $this->hasMany('App\Pet');
    }

    public function posts() {//【RELATION】「User hasMany Posts」
        return $this->hasMany('App\Post');
    }

    public function comments() {//【RELATION】「User hasMany Comments」
        return $this->hasMany('App\Comment');
    }

    // public function chats() {//【RELATION】「User hasMany Chats」
    //     return $this->hasMany('App\Chat');
    // }

    public function pettypes()//【RELATION】「User belongsToMany Pettypes」
    {
    return $this->belongsToMany('App\Pettype','pettype_users');//第二引数で参照するテーブル名を指定できる
    //return $this->belongsToMany('App\Pettype');//「pettype_user」テーブルを参照しようとする
    }

    public function groups()//【RELATION】「User belongsToMany Groups」
    {
      return $this->belongsToMany('App\Group');
    }
}
