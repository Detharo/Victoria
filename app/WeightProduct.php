<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightProduct extends Model
{
    //
    protected $table = 'weight_products';

    protected $fillable = [
        'WGT_description'
    ];

    public function product(){
        $this->hasMany('App/Products');
    }
}
