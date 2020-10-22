<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function product_categories(){
        return $this->hasMany('App\ProductCategories');
    }
}
