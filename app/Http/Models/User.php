<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role', 'strip_customer_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member()
    {
        return $this->hasOne('App\Http\Models\Member');
    }

    public function isValidSubscription()
    {
        $objStripe = new StripeMarketplaceManager();
        $customer = $objStripe->Customer->get($this->strip_customer_id);
        $negative = '';
        if (count($customer['subscriptions']) > 0) {
            foreach ($customer['subscriptions'] as $subscription) {
                if ($subscription->status === 'active') {
                    return true;
                } else {
                    $negative .= $subscription->status . ' ';
                }
            }
        }
        return $negative;
    }

    public static function add($data)
    {
        $objStripe = new StripeMarketplaceManager();
        $customerId = $objStripe->Customer->save($data['firstName'] . ' ' . $data['lastName'], $data['email'], $data['stripeToken']);
        if ($customerId !== false) {
            $objUser = User::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'strip_customer_id' => $customerId,
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
            ]);
            $planId = $data['plan'];
            $subscriptionId = Subscription::add([
                'customerId' => $customerId,
                'planId' => $planId,
                'userId' => $objUser->id,
                'quantity' => (int) $data['quantity'],
            ]);
            if ($subscriptionId !== false) {
                return $objUser;
            }
        }
        return false;
    }

    public static function addStudent($data, $objMember)
    {
        $objStripe = new StripeMarketplaceManager();
        $customerId = $objStripe->Customer->save($data['firstName'] . ' ' . $data['lastName'], $data['email'], $data['stripeToken'], $data['accountId']);
        if ($customerId !== false) {
            $objMember->strip_customer_id = $customerId;
            $objMember->save();
            $objUser = User::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'strip_customer_id' => $customerId,
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
            ]);
            $planId = $data['plan'];
            $objStripe = new StripeMarketplaceManager();
            $subscriptionId = $objStripe->Subscription->save($customerId, $planId, 1, strtotime($objMember->enrolment), $data['accountId']);
            if ($subscriptionId !== false) {
                return $objUser;
            }
        }
        return false;
    }
}
