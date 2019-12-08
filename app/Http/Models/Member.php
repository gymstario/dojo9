<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use bitspro\StripeMarketplace\StripeMarketplaceManager;


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

    public static function add($data, $setupStripe = false)
    {
        $objMember = new Member;
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
        $objMember->ssn_last_4 = $data['ssn'];
        $objMember->title = $data['title'];
        $objMember->email = $data['email'];
        $objMember->phone = $data['phone'];
        // $objMember->enrolment = isset($data['enrolment']) ? $data['enrolment'] : null;
        if (!$objMember->save()) {
            return false;
        }
        if ($setupStripe) {
            $objStripe = new StripeMarketplaceManager();
            $customerId = $objStripe->Customer->save($data['firstName'] . ' ' . $data['lastName'], $data['email'], $data['stripeToken']);
            if ($customerId === false) {
                $objMember->strip_customer_id = $customerId;
                $objMember->save();
                return false;
            }
        }
        return $objMember;
    }
}
