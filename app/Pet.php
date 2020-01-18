<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'user_id','name' ,'image','gender' ,'characteristic',
    ];  

    public function user() {//【RELATION】「Pets belongsTo User」
        return $this->belongsTo('App\User');
    }

    public function pettype() {//【RELATION】「Pets belongsTo Pettype」
        return $this->belongsTo('App\Pettype');
    }

    public function pets() {//【RELATION】「Post hasMany Pets」
        return $this->hasMany('App\Pet');
    }
}
