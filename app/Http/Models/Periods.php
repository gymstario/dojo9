<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    protected $table = 'classes';

    public function branch()
    {
        return $this->hasMany('App\Models\Branch');
    }

    public function class_member()
    {
        return $this->hasMany('App\Models\Class_Member');
    }
}
