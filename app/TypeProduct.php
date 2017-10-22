<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    //
    protected $table = 'type_products';

    protected $fillable = [
        'description'
    ];

    public function product(){
        $this->hasMany('App/Product');
    }
}
