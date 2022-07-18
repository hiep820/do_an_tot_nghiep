<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';
    public function category(){
    	return $this->beLongsTo('App\models\category', 'category_id', 'id');
    }
    public function prd_order(){
    	return $this->hasMany('App\models\prd_order', 'product_id', 'id');
    }

    public function orders() {
        return $this->belongsToMany('App\models\order', 'product_order', 'product_id', 'order_id');
    }

}
