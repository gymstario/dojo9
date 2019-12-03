<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    public function store(){
        return $this->belongsTo('App\Models\Store');
    {
    
    public function class(){
        return $this->belongsTo('App\Models\Class');
        
    }    
}
