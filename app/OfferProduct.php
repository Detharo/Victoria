<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    //
	protected $table = 'offer_products';

	protected $fillable = [
		'PDT_id',
		'OFF_price',
		'OFF_quantity'
	];

    public function Products(){
		$this->hasMany('App/Products');
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
