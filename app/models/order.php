<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    public function prd_order(){
    	return $this->hasMany('App\models\prd_order', 'order_id', 'id');
    }
}
