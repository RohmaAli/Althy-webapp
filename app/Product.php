<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_categories(){
        return $this->belongsTo('App\ProductCategories');
    }

    public function carts(){
        return $this->belongsToMany('App\Cart');
    }
}
