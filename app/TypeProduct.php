<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    //

	protected $table = 'type_products';

	protected $fillable = [
		'TPR_description'
	];

	public function product(){
		$this->hasMany('App/Products');
	}

}
