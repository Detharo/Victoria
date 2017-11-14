<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    //

    protected $table = 'type_users';

    protected $fillable = [
        'TUS_description'
    ];

    public function user(){
        $this->hasMany('App/User');
    }

}