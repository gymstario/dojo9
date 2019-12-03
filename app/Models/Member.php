<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public function user(){
        return $this->belongsTo('App\Models\User');
    } 

    public function subscription(){
        return $this->hasMany('App\Models\subscription');
    }

    public function store(){
        return $this->hasMany('App\Models\store');
    }

    public function member_dependent(){
        return $this->hasMany('App\Models\Member_Dependent');
    }

    public function class_member(){
        return $this->hasMany('App\Models\Class_Member');
    }
}
