<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    public $timestamps=false;
    public function prd(){
    	return $this->hasMany('App\models\Product', 'category_id', 'id');
    } 
}
