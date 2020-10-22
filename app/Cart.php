<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products(){
        return $this->belongsToMany('App\Product');
    }

    public function customers(){
        return $this->belongsToMany('App\Customer');
    }
}
