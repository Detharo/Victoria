<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    //
    protected $table = 'status_products';

    protected $fillable = [
        'STS_description'
    ];


    public function QuantityProduct()
    {
        $this->belongsTo('App/QuantityProduct');
    }
}

