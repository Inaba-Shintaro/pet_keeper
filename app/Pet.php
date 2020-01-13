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
}
