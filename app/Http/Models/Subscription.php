<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = ['user_id', 'stripe_subscription_id'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public static function add($data)
    {
        $objStripe = new StripeMarketplaceManager();
        $subscriptionId = $objStripe->Subscription->save($data['customerId'], $data['planId'], $data['quantity']);
        if ($subscriptionId !== false) {
            $objSubscription = new Subscription;
            $objSubscription->user_id = $data['userId'];
            $objSubscription->stripe_subscription_id = $subscriptionId;
            $objSubscription->quantity = $data['quantity'];
            $objSubscription->save();
            return $objSubscription;
        }
        return false;
    }
}
