<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_Dependent extends Model
{
    protected $table = 'member_dependents';

    public function member();{
        return $this->belongsTo('App\Models\Member');
    }
}
