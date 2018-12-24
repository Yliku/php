<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    protected $table = 'users';
    public function posts(){
        return $this->hasOne('App\Post', 'id','id');
    }
}
