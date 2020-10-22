<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function carts(){
        return $this->belongsToMany('App\Cart');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
