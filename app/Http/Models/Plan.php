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

    public static function getAdminPlan($id)
    {
        $objStripe = new StripeMarketplaceManager();
        $stripePlan = $objStripe->Plan->get($id);
        if ($stripePlan !== false) {
            $output = $stripePlan;
            return $output;
        }
        return [];
    }

    public static function getOwnerPlans($id)
    {
        $objStripe = new StripeMarketplaceManager();
        $data = $objStripe->Plan->getAll(100, $id);
        return [
            "data" => $data["data"],
            "hasMore" => $data["has_more"],
        ];
    }

    public static function add($data, $stripeAccount)
    {
        $objStripe = new StripeMarketplaceManager();
        return $objStripe->Plan->save($data['name'], $data['interval'], $data['target'], 1, $data['amount'], $data['attributes'], $data['active'], $stripeAccount);
    }
}
