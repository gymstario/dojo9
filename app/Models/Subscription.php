<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    public function member(){
        return $this->belongsTo('App\Models\Member');
    }
}
