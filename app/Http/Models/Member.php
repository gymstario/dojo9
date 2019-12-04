<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }
}
