<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityProduct extends Model
{
    //
	protected $table = 'quantity_products';

	protected $fillable = [
	    'QTY_id',
		'QTY_description',
		'PDT_id',
		'STS_id',
	];

    public function Products(){
		$this->hasMany('App/Products');
	}
	public function StatusProduct(){
		$this->hasMany('App/StatusProduct');
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
