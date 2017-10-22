<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    //
    protected $table = 'status_products';

    protected $fillable = [
      'description'
    ];

    public function product(){
        $this->hasMany('App/Product');
    }
}
