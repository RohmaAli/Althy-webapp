<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public function product_categories(){
        return $this->hasMany('App\ProductCategories');
    }
}
