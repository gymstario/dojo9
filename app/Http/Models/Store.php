<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public function member(){
        return $this->belongsTo('App\Models\Member');
    }

    public function branch(){
        return $this->hasMany('App\Models\branch');
    }
}