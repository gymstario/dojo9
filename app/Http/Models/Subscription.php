<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use bitspro\StripeMarketplace\StripeMarketplaceManager;

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
        $subscriptionId = $objStripe->Subscription->save($data['customerId'], $data['planId']);
        if ($subscriptionId !== false) {
            $objSubscription = Subscription::create([
                'user_id' => $data['userId'],
                'stripe_subscription_id' => $subscriptionId
            ]);
            return $objSubscription;
        }
        return false;
    }
}
