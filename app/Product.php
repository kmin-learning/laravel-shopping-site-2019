<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamp = false;
    protected $table = 'products';

    public function orders(){
        return $this->belongsToMany('App\order','order_product','order_id','product_id')->withPivot('quantity','total');
    }
}
