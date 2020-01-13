<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id','post_id','chat',
    ];

    // public function user() {//【RELATION】「Chats belongsTo User」
    //     return $this->belongsTo('App\User');
    // }

    // public function comments() {//【RELATION】「Chat hasMany Comments」
    //     return $this->hasMany('App\Comment');
    // }
}
