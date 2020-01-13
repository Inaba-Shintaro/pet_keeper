<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pettype extends Model
{
    protected $fillable = [
        'type_name', 
    ];

    public function pets() {//【RELATION】「Pettype hasMany Pets」
        return $this->hasMany('App\Pet');
    }

    public function users()//【RELATION】「Pettype belongsToMany Users」
    {
        return $this->belongsToMany('App\User','pettype_users');//第二引数で参照するテーブル名を指定できる
        //return $this->belongsToMany('App\User');//「pettype_user」テーブルを参照しようとする
    }
}
