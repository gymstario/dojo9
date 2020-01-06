<?php

namespace App\Http\Models;

use App\Mail\StudentInvitation;
use Illuminate\Database\Eloquent\Model;
use Mail;

class Member extends Model
{
    protected $table = 'members';

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }

    public function studio()
    {
        return $this->hasOne('App\Http\Models\Studio');
    }

    public function products()
    {
        return $this->hasMany('App\Http\Models\Product');
    }

    public static function store($data)
    {
        $objMember = Member::where('user_id', $data['userId'])->get();
        if ($objMember->count() > 0) {
            $objMember = $objMember->first();
        } else {
            $objMember = new Member;
        }
        $objMember->user_id = $data['userId'];
        $objMember->type = $data['type'];
        $objMember->first_name = $data['firstName'];
        $objMember->last_name = $data['lastName'];
        $objMember->dob = $data['dob'];
        $objMember->address = $data['address'];
        $objMember->city = $data['city'];
        $objMember->state = $data['state'];
        $objMember->zip = $data['zip'];
        $objMember->country = $data['country'];
        $objMember->ssn = $data['ssn'];
        $objMember->title = $data['title'];
        $objMember->email = $data['email'];
        $objMember->phone = $data['phone'];
        // $objMember->enrolment = isset($data['enrolment']) ? $data['enrolment'] : null;
        if (!$objMember->save()) {
            return false;
        }
        return $objMember;
    }

    public static function storeStudent($data)
    {
        $objMember = new Member;
        $objMember->studio_id = $data['studio_id'];
        $objMember->type = 'Student';
        $objMember->first_name = $data['firstName'];
        $objMember->last_name = $data['lastName'];
        $objMember->dob = $data['dob'];
        $objMember->rank = $data['rank'];
        $objMember->email = $data['email'];
        $objMember->phone = $data['phone'];
        $objMember->photo = $data['photo'];
        $objMember->stripe_plan_id = $data['stripe_plan_id'];
        $objMember->enrolment = isset($data['enrolment']) ? $data['enrolment'] : null;
        if (!$objMember->save()) {
            return false;
        }
        $name = $data['firstName'] . ' ' . $data['lastName'];
        Mail::to($data['email'])->send(new StudentInvitation($name, $data['studioName'], env('APP_URL') . '/enrolment/' . encrypt($objMember->id)));
        return $objMember;
    }
}
