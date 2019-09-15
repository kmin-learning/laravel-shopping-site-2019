<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';

    // protected $fillable = ['id','name','email','contact_number','address','total_cost','status'];

    public function products(){
        return $this->belongsToMany('App\Product','order_product','order_id','product_id')->withPivot('quantity','total');
    }
}
