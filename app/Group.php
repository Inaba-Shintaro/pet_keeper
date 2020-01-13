<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'pet_holder_id','name' ,'image','gender' ,'characteristic',
    ];  

    public function users()//【RELATION】「Group belongsToMany Users」
    {
        return $this->belongsToMany('App\User');
    }
}
