<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Member extends Model
{
    public function member(){
        return $this->belongsTo('App\Models\Member');
    {
    public function class(){
        return $this->belongsTo('App\Models\Class');
    {
}
