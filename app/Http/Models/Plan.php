<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $table = 'plans';

    public static function getAdminPlans() {
        $output = [];
        $planIds = Plan::all();
        $objStripe = new StripeMarketplaceManager();
        foreach($planIds as $planId) {
            $plan = $objStripe->Plan->get($planId->stripe_id);
            $output[] = [
                "id" => $planId->id,
                "stripeId" => encrypt($planId->stripe_id),
                "name" => $plan["nickname"],
                "interval_count" => $plan["interval_count"],
                "active" => $plan["active"],
                "amount" => $plan["amount"] / 100,
                "currency" => $plan["currency"],
                "interval" => $plan["interval"],
                "attributes" => json_decode(json_encode($plan["metadata"]), true),
            ];
        }
        return $output;
    }
}
