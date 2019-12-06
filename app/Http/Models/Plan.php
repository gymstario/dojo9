<?php

namespace App\Http\Models;

use bitspro\StripeMarketplace\StripeMarketplaceManager;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $table = 'plans';

    public static function getAdminPlans()
    {
        $output = [];
        $plans = Plan::all();
        if (count($plans) > 0) {
            $objStripe = new StripeMarketplaceManager();
            foreach ($plans as $plan) {
                $stripePlan = $objStripe->Plan->get($plan->stripe_id);
                if ($stripePlan !== false) {
                    $output[] = array_merge(['role' => $plan->role], $stripePlan);
                }
            }
            return $output;
        }
        return [];
    }
}
