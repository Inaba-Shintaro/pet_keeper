<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 'email', 'password','introduction','image'
    ];

    public function user() {//【RELATION】「Posts belongsTo User」
        return $this->belongsTo('App\User');
    }

    public function pet() {//【RELATION】「Posts belongsTo Pet」
        return $this->belongsTo('App\Pet');
    }

    public function comments() {//【RELATION】「Post hasMany Comments」
        return $this->hasMany('App\Comment');
    }
}
