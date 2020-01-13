<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PettypeUser extends Model
{
    protected $fillable = [
        'user_id','pettype_id', 
    ];
}
