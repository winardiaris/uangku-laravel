<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    //
    protected $fillable = [
        'users_id', 'value', 'token','date','desc','status','type',
    ];
}
