<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable =[
        'PDT_name',
        'PDT_brand',
        'PDT_price',
        'TPR_type',
        'PDT_weight',
        'WGT_type',
        'PDT_code',
        'PDT_description'
    ];

    public function TypeProduct()
    {
        $this->belongsTo('App/TypeProduct');
    }
    public function WeightProduct()
    {
        $this->belongsTo('App/WeightProduct');
    }
    public function DecreaseProduct()
    {
        $this->belongsTo('App/DecreaseProduct');
    }
    public function QuantityProduct()
    {
        $this->belongsTo('App/QuantityProduct');
    }
    public function SoldProduct()
    {
        $this->belongsTo('App/SoldProduct');
    }
    public function OfferProduct()
    {
        $this->belongsTo('App/OfferProduct');
    }

    /**
     * Get the connection of the entity.
     *
     * @return string|null
     */
    public function getQueueableConnection()
    {
        // TODO: Implement getQueueableConnection() method.
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        // TODO: Implement resolveRouteBinding() method.
    }
}
