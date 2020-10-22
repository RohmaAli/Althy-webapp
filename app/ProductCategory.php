<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function partners(){
        return $this->belongsTo('App\Partner');
    }

    public function product_types(){
        return $this->belongsTo('App\ProductType');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

}
