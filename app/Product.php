<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //a que tabla se hace referencia
    protected $table='products';

    //los campos que son asignables masivamente
    protected $fillable =[
        'name',
        'brand',
        'price',
        'quantity',
        'type_product',
        'cod_product',
        'des_product',
        'cod_status'
    ];
    public function StatusProduct(){
        $this->belongsTo('App/StatusProduct');
    }
    public function TypeProduct(){
        $this->belongsTo('App/TypeProduct');
    }
}
