<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id','comment',
    ];

    public function user() {//【RELATION】「Comments belongsTo User」
        return $this->belongsTo('App\User');
    }

    // public function chat() {//【RELATION】「Comments belongsTo Chat」
    //     return $this->belongsTo('App\Chat');
    // }

    public function post() {//【RELATION】「Comments belongsTo Post」
        return $this->belongsTo('App\Post');
    }
}
